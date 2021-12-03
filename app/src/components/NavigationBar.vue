<template>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://www.paroquia10.com/images/icone_transp.png" alt="" height="24">
            Paróquia 10
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" style="width:70%" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <img src="https://www.paroquia10.com/images/icone_transp.png" alt="" height="24">
                Paróquia 10
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">                
                    <router-link class="nav-item" active-class="active" to="/">Início</router-link>
                    <router-link class="nav-item" active-class="active" to="/login">Entrar</router-link>
                    <router-link class="nav-item" active-class="active" to="/about">Sobre</router-link>
                </ul>            
            </div>
        </div>
        </div>
    </nav>
</template>
<script>
export default {
    name: 'NavigationBar',
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
.nav-item{
    height: 60px;
    border-bottom: 1px solid; 
    border-color: gray;
    padding: 25px;
    text-decoration: none;
    color: gray;
}

</style>