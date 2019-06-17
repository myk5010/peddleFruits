import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes: [
        {
          path: '/index',
          component: () => import('./views/laboratory/consumables/index.vue')
        },
        {
          path: '/',
          component: () => import('./views/laboratory/system/Login.vue')
        }
    ]
})
