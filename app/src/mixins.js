export const logoutMixin = {
    methods: {
        doLogout () {
            this.$store.commit('USER_LOGOUT')
            this.$router.push({ name: 'Home' })
            if(document.querySelector('#offcanvasNavbar').classList.contains('show')){                
                document.querySelector('.navbar-toggler').click();
            }
        }
    }
}