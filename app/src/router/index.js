import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/Login'

//Vue.use(VueRouter)

const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/login', component: Login, name: 'Login' }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router