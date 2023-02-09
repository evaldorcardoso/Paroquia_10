<template>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <router-link :to="{ name: 'Home' }" class="navbar-brand">
            <img src="@/assets/images/icone_transp.png" alt="" height="24">
            Paróquia 10
        </router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" style="width:70%" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <img src="@/assets/images/icone_transp.png" alt="" height="24">
                Paróquia 10
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="row text-rose">
                    <div class="col-auto me-auto" v-if="user">{{ user.name }}</div>
                    <div class="col-auto" @click.prevent="handleLogout" v-if="user">Sair</div>
                    <hr>
                    <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                        <router-link class="nav-item" active-class="active" :to="{name:'Home'}">Início</router-link>
                        <router-link class="nav-item" active-class="active" :to="{name:'UserProfile'}" v-if="user">Meus Dados</router-link>
                        <router-link class="nav-item" active-class="active" :to="{name:'CongregationProfile'}" v-if="user">Minha Congregação</router-link>
                        <router-link class="nav-item" active-class="active" :to="{name:'Login'}" v-if="!user">Entrar</router-link>
                        <router-link class="nav-item" active-class="active" :to="{name:'About'}">Sobre</router-link>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </nav>
</template>
<script>
import { computed } from 'vue'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

export default {
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

        return {
            handleLogout,
            user: computed(() => store.state.user)
        }
    },
    watch: {
        '$route'(){
            if(document.querySelector('#offcanvasNavbar').classList.contains('show')){
                document.querySelector('.navbar-toggler').click();
            }
        }
    }
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
.navbar-brand {
  padding-top: 0.3125rem;
  padding-bottom: 0.3125rem;
  margin-right: 1rem;
  font-size: 1.25rem;
  text-decoration: none;
  white-space: nowrap;
  font-weight: 900;
}
</style>
