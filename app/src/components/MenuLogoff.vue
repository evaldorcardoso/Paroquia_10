<template>
    <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">                
        <router-link class="nav-item" active-class="active" :to="{name:'Home'}">Início</router-link>
        <router-link class="nav-item" active-class="active" :to="{name:'Login'}">Entrar</router-link>
        <router-link class="nav-item" active-class="active" :to="{name:'About'}">Sobre</router-link>
    </ul>            
</template>
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