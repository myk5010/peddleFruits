import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes: [
        // 登录
        {
          path: '/login',
          component: () => import('./views/Login.vue')
        },
        // 管理后台
        {
          path: '/admin/index',
          component: () => import('./views/Admin/Index.vue')
        },
        {
          path: '/',
          component: () => import('./views/Front/Index.vue')
        },
    ]
})
