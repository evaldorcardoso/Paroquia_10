<template>
    <div class="row text-rose">
        <div class="col-auto me-auto">Olá {{userLoggedName}}</div>
        <div class="col-auto" @click.prevent="handleLogout">Sair</div>
        <hr>
        <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">                
            <router-link class="nav-item" active-class="active" :to="{name:'Home'}">Início</router-link>
            <router-link class="nav-item" active-class="active" :to="{name:'UserProfile'}">Meus Dados</router-link>
            <router-link class="nav-item" active-class="active" :to="{name:'CongregationProfile'}">Minha Congregação</router-link>
            <router-link class="nav-item" active-class="active" to="/about">Sobre</router-link>
        </ul>            
    </div>
</template>
<script>
// import { logoutMixin } from '@/mixins'
import { mapGetters, useStore } from 'vuex'
import { useRouter } from 'vue-router'

export default {
    // mixins: [logoutMixin],
    setup() {
        const store = useStore()
        const router = useRouter()

        const handleLogout = () => {
            store.dispatch('doLogout')
            router.push({ name: 'Home' })
            if(document.querySelector('#offcanvasNavbar').classList.contains('show')){                
                document.querySelector('.navbar-toggler').click();
            }
        }

        return { handleLogout }
    },
    computed: {
    ...mapGetters(["userLoggedName"])
  },
}
</script>
<style scoped>
.nav-item.active{
    color:  #ec407a;
    font-style: bold;
    border-bottom: 1px solid; 
    border-color:  #ec407a;
}
.nav-item {
    height: 60px;
    border-bottom: 1px solid;
    border-color: gray;
    padding: 25px;
    text-decoration: none;
    color: gray;
}
</style>