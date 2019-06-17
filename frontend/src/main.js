import Vue from 'vue'
import App from './App.vue'
import store from './store'
// 插件
import axios from 'axios'
import router from './router'
import './plugins/element.js'
// 依赖
import echarts from 'echarts'

Vue.config.productionTip = false

// 请求
Vue.prototype.$ajax = axios
Vue.prototype.$ajax.defaults.baseURL = process.env.VUE_APP_API_HOST
Vue.prototype.$ajax.defaults.timeout = 1000 * 15
Vue.prototype.$ajax.defaults.headers.post['Content-Type'] = 'application/json;charset=UTF-8'
// 图表
Vue.prototype.$echarts = echarts

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')

// 请求拦截器
axios.interceptors.request.use(
  config => {
    // 每次发送请求之前判断vuex中是否存在token
    // 如果存在，则统一在http请求的header都加上token，这样后台根据token判断你的登录情况
    // 即使本地存在token，也有可能token是过期的，所以在响应拦截器中要对返回状态进行判断
    const token = sessionStorage.getItem("authKey")
    token && (config.headers.access_token = token);
    return config;
  },
  error => {
    return Promise.error(error);
  }
)

// 响应拦截器
axios.interceptors.response.use(
  response => {
    if (response.status === 200) {
        return Promise.resolve(response);
    } else {
        return Promise.reject(response);
    }
  },
  error => {
    if (error.response.status) {
      switch (error.response.status) {
        // 401: 未登录
        case 401:
          router.replace({
              path: '/',
              // query: {
              //     redirect: router.currentRoute.fullPath
              // }
          });
          break;
        // 403 token过期
        case 403:
          Vue.prototype.$message({
              showClose: true,
              duration: 0,
              message: '登录过期，请重新登录',
              type: 'error'
          })
          router.replace({
            path: '/',
          });
          // 清除token
          // localStorage.removeItem('token');
          // store.commit('loginSuccess', null);
          // // 跳转登录页面，并将要浏览的页面fullPath传过去，登录成功后跳转需要访问的页面
          // setTimeout(() => {
          //     router.replace({
          //         path: '/login',
          //         query: {
          //             redirect: router.currentRoute.fullPath
          //         }
          //     });
          // }, 1000);
          break;
        // 404请求不存在
        case 404:
          Vue.prototype.$message({
              showClose: true,
              duration: 0,
              message: '网络请求不存在',
              type: 'error'
          })
          break;
        // 其他错误，直接抛出错误提示
        default:
          Vue.prototype.$message({
            showClose: true,
            duration: 0,
            message: error.response.data.message,
            type: 'error'
          })
      }
      return Promise.reject(error.response);
    }
  }
)