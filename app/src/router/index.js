import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/Login'
import About from '@/components/About'

//Vue.use(VueRouter)

const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/login', component: Login, name: 'Login' },
    { path: '/about', component: About, name: 'About' }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router