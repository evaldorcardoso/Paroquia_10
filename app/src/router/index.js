import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/Home'
import CongregationView from '@/views/Congregation'
import EventView from '@/views/Event'
import LoginView from '@/views/Login'
import AboutView from '@/views/About'
import CongregationProfile from '@/views/admin/CongregationProfile'
import EventForm from '@/views/admin/EventForm'
import UserProfile from '@/views/admin/UserProfile'
import store from '@/store'

//Vue.use(VueRouter)

const routes = [
    { path: '/', component: HomeView, name: 'Home', meta: { public: true }},
    { path: '/congregation/:uuid', component: CongregationView, name: 'Congregation', meta: { public: true }},
    { path: '/congregation/:congregation_id/event/:id', component: EventView, name: 'Event', meta: { public: true }},
    { path: '/login', component: LoginView, name: 'Login', meta: { public: true } },
    { path: '/about', component: AboutView, name: 'About', meta: { public: true } },
    { path: '/admin/congregation', component: CongregationProfile, name: 'CongregationProfile'},
    { path: '/admin/:congregation_id/event/:id', component: EventForm, name: 'EventForm'},
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
