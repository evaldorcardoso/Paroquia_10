import { useStore } from 'vuex'
import { useRouter } from 'vue-router'
export const logoutMixin = {
    methods: {
        doLogout () {
            const store = useStore()
            const router = useRouter()
            store.commit('USER_LOGOUT')
            router.push({ name: 'Home' })
            if(document.querySelector('#offcanvasNavbar').classList.contains('show')){                
                document.querySelector('.navbar-toggler').click();
            }
        }
    }
}