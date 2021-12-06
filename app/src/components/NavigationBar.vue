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
                <MenuLogged v-if="userIsLogged"/>
                <MenuLogoff v-else/>        
            </div>
        </div>
        </div>
    </nav>
</template>
<script>
import MenuLogged from './MenuLogged.vue'
import MenuLogoff from './MenuLogoff.vue'
import { mapGetters } from 'vuex'

export default {
    name: 'NavigationBar',
    components: {
        MenuLogged,
        MenuLogoff
    },
    computed: {
        ...mapGetters(['userIsLogged'])
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
