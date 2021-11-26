import { createApp } from 'vue'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import http from '@/http'

const paroquiaApp = createApp(App)
paroquiaApp.config.globalProperties.$http = http
paroquiaApp.mount('#app')