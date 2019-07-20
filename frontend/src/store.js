import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      authKey: '',
      userInfo: '',
      isLogin: false,
    },
    getters:{
      isLogin (state) {  
        if (!state.isLogin) {      
          state.isLogin = sessionStorage.getItem('isLogin')
          state.authKey = sessionStorage.getItem('authKey')
          state.userInfo = JSON.parse(sessionStorage.getItem('userInfo'))
        }  
        return state.isLogin
      }
    },
    mutations: {
      // 登入，保存状态  
      ADD_LOGIN_USER (state, data) {  
        state.authKey = data['authKey']
        state.userInfo = data['userInfo']
        state.isLogin = true
        // 防止刷新丢数据, 存sessionStorage
        sessionStorage.setItem("authKey", data['authKey'])
        sessionStorage.setItem("userInfo", JSON.stringify(data['userInfo']))
        sessionStorage.setItem("isLogin",true) 
      },
      // 退出，删除状态  
      SIGN_OUT (state) {   
        sessionStorage.removeItem("userInfo") 
        sessionStorage.removeItem("isLogin") 
        sessionStorage.setItem("isLogin", false)  
        state.authKey = ''  
        state.userInfo = ''                
        state.isLogin = false  
      },
    },
    actions: {

    }
})
