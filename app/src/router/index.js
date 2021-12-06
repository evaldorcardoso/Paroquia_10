import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/Login'
import About from '@/components/About'
import store from '@/store'

//Vue.use(VueRouter)

const routes = [
    { path: '/', component: Home, name: 'Home', meta: { public: true }},
    { path: '/login', component: Login, name: 'Login', meta: { public: true } },
    { path: '/about', component: About, name: 'About', meta: { public: true } }
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