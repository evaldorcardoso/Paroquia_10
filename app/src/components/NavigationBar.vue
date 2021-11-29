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
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <img src="https://www.paroquia10.com/images/icone_transp.png" alt="" height="24">
                Paróquia 10
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            <ul id="nav" class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <router-link to="/">
                    <li class="nav-item">
                        Início
                    </li>
                </router-link>
                <router-link to="/login">                
                    <li class="nav-item">
                        Entrar    
                    </li>            
                </router-link>
            </ul>
            
            </div>
        </div>
        </div>
    </nav>
</template>
<script>
export default {
    name: 'NavigationBar'
}
</script>