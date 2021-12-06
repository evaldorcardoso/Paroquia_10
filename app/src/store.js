import { createStore } from 'vuex'
import http from '@/http'

const state = {
    token: null,
    user: {}
}

const mutations = {
    DEFINE_USER_LOGGED (state, { token, user }) {
        state.token = token
        state.user = user
    },
    USER_LOGOUT (state) {
        state.token = null
        state.user = {}
    }
}

const actions = {
    doLogin ({ commit }, user) {
        return new Promise((resolve, reject) => {
            http.post('/api/login', user)
            .then(response => {
                commit('DEFINE_USER_LOGGED', {
                    token: response.data.token,
                    user: user
                })
                resolve(response.data)
            })
            .catch(error => {
                console.log(error.response);
                reject(error)
            });
        })
    }
}

const getters = {
    userIsLogged: state => Boolean(state.token)
}

export default new createStore({
    state,
    actions,
    mutations,
    getters
})