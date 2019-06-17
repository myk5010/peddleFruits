import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes: [
        // 登录
        {
          path: '/',
          component: () => import('./views/Login.vue')
        },
        // {
        //   path: '/index',
        //   component: () => import('./views/laboratory/consumables/index.vue')
        // },
    ]
})
