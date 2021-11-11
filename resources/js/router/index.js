import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('@/views/app/Home.vue'),
        },

        {
            path: '*',
            redirect: 'home',
        },
    ]
})

export default router
