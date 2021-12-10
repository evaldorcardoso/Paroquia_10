import { createApp } from 'vue'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import store from './store'
import http from '@/http'
import router from '@/router'

//global styles
import '@/assets/css/main.css'

const paroquiaApp = createApp(App)
paroquiaApp.config.globalProperties.$http = http
// paroquiaApp.config.globalProperties.$store = store
paroquiaApp.use(router)
paroquiaApp.use(store)
paroquiaApp.mount('#app')