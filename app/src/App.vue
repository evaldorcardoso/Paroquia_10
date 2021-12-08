<template>
  <div class="sidebar" data-color="rose" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="http://www.paroquia10.com" class="simple-text logo-normal">
          <img src="images/icone_transp_compl.png" style="width:80px">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="li_inicio" class="nav-item active">
            <a class="nav-link" href="#" onclick="muda_tela('principal');">
              <i class="material-icons"></i>
              <p>Início</p>
            </a>
          </li>
          <li id="li_entrar" class="nav-item">
            <a class="nav-link" href="#" onclick="muda_tela('acesso');">
              <i class="material-icons"></i>
              <p>Entrar</p>
            </a>
          </li>
          <li id="li_alterar" class="nav-item" style="display: none;">
            <a class="nav-link" href="#" onclick="alterar();">
              <i class="material-icons"></i>
              <p>Alterar</p>
            </a>
          </li>
          <li id="li_sair" class="nav-item">
            <a class="nav-link" href="#" onclick="sair();">
              <i class="material-icons"></i>
              <p>Sair</p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="/letras">
              <i class="material-icons"></i>
              <p>Letras</p>
            </a>
          </li>-->
        </ul>
      </div>
  </div>
  <div class="main-panel">
    <NavigationBar />
    <router-view/>
  </div>
</template>

<script>
  
  import NavigationBar from '@/components/NavigationBar'

  export default {
    components: {
      NavigationBar
    }
  }
</script>

<style>

</style>
