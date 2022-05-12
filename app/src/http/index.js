import axios from 'axios'
import store from '@/store'

const http = axios.create({
    baseURL: 'http://localhost:3000',
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

http.interceptors.request.use(function (config) {
    const token = store.state.token
    if(token){
        config.headers.Authorization = `Bearer ${token}`
    }
    return config
}, function(error){
    return Promise.reject(error)
})

export default http
