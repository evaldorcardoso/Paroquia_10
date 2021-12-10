<template>
  <div class="sidebar" data-color="rose" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="http://www.paroquia10.com" class="simple-text logo-normal">
          <img src="images/icone_transp_compl.png" style="width:80px">
        </a>
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
