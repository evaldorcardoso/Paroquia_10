import { createStore } from 'vuex'
import http from '@/http'

const state = {
    token: null,
    user: null
}

const mutations = {
    DEFINE_USER_LOGGED (state, {token, user}) {
        state.token = token
        state.user = user
    },
    USER_LOGOUT (state) {
        state.token = null
        state.user = null
    }
}

const actions = {
    async doLogin ({ commit }, { email, password }) {
        return new Promise((resolve, reject) => {
            http.post('/api/public/login', { email, password })
            .then(response => {
                console.log(response.data)
                commit('DEFINE_USER_LOGGED', {
                    token: response.data.token,
                    user: response.data
                })
                resolve(response.data)
            })
            .catch(error => {
                console.log(error.response);
                reject(error)
            });
        })
    },
    async doLogout({ commit }) {
        console.log('logout action');
        commit('USER_LOGOUT')
    }
}

const getters = {
    userIsLogged: state => Boolean(state.token),
    userLoggedName: state => state.user.name
}

export default new createStore({
    state,
    actions,
    mutations,
    getters
})