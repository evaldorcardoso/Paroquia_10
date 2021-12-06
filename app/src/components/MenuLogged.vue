<template>
    <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">                
        <router-link class="nav-item" active-class="active" to="/">Início</router-link>
        <a class="nav-item" @click.prevent="doLogout">Sair</a>
        <router-link class="nav-item" active-class="active" to="/about">Sobre</router-link>
    </ul>            
</template>
<script>
import { logoutMixin } from '@/mixins'

export default {
    mixins: [logoutMixin]
}
</script>
<style scoped>
.nav-item.active{
    color:  #ec407a;
    font-style: bold;
    border-bottom: 1px solid; 
    border-color:  #ec407a;
}
.nav-item{
    height: 60px;
    border-bottom: 1px solid; 
    border-color: gray;
    padding: 25px;
    text-decoration: none;
    color: gray;
}
</style>