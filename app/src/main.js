import { createApp } from 'vue'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import http from '@/http'
import router from '@/router'

const paroquiaApp = createApp(App)
paroquiaApp.config.globalProperties.$http = http
paroquiaApp.use(router)
paroquiaApp.mount('#app')