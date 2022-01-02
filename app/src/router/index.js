import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home'
import Congregation from '@/views/Congregation'
import Event from '@/views/Event'
import Login from '@/views/Login'
import About from '@/views/About'
import CongregationProfile from '@/views/admin/CongregationProfile'
import UserProfile from '@/views/admin/UserProfile'
import store from '@/store'

//Vue.use(VueRouter)

const routes = [
    { path: '/', component: Home, name: 'Home', meta: { public: true }},
    { path: '/congregation/:id', component: Congregation, name: 'Congregation', meta: { public: true }},
    { path: '/congregation/:congregation_id/event/:id', component: Event, name: 'Event', meta: { public: true }},
    { path: '/login', component: Login, name: 'Login', meta: { public: true } },
    { path: '/about', component: About, name: 'About', meta: { public: true } },
    { path: '/admin/congregation', component: CongregationProfile, name: 'CongregationProfile'},
    { path: '/admin/user', component: UserProfile, name: 'UserProfile'}
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((routeTo, routeFrom, next) => {
    if(!routeTo.meta.public && !store.state.token){
        return next({ path: '/login' })
    }
    next()
})

export default router