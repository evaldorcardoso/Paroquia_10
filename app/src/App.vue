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
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Entrar</a>
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-fluid">	        	
    <div class="col">
      <div class="card">
        <div class="card-header card-header-rose">
          <h4 class="card-title">Seu informativo digital</h4>
          <p class="card-category">Para começar, encontre a sua congregação..</p>
        </div>
        <div class="card-body table-responsive">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Pesquise por nome..." aria-label="Pesquisar">
          </form>
          <table class="table table-hover">
            <thead class="text-rose"/>
            <tbody style="border-top: 0px;">
              <tr v-for="congregation in congregations" :key="congregation.id">
                <td style="padding: 12px 8px; vertical-align: middle;border-color: #ddd;">
                  <p style="margin-bottom: 5px;color: #e91e63;font-weight: bolder;line-height: 1.5em;">{{ congregation.name }}</p>
                  <p style="font-size:85%;margin-bottom: -5px;line-height: 1.5em;">{{ congregation.address }}</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import http from '@/http'

export default {
  name: 'App',
  data () {
    return {
      congregations: []
    }
  },
  methods: {
    getCongregations(){
      http.get('/api/congregations')
        .then(response => {
          this.congregations = response.data.data;
          console.log(response.data.data);
          // console.log(this.congregations);
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  mounted () {
    this.getCongregations();
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
#app {
  font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  font-weight: 300;
  line-height: 1.5em;
}

.card {
  box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
  border-radius: 6px;
  margin-top: 90px;  
  color: #333333;
  background: #fff;
  width: 100%;
  font-size: .875rem;
}
.card-header-rose {
  background: linear-gradient(60deg, #ec407a, #d81b60);
  border-radius: 3px;
  margin-top: -20px;
  padding: 15px;
  box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(233 30 99 / 40%);
  margin: -20px 15px 0;
}
.card-title {
  color: #fff;
  margin-top: 0;
}
.card-category {
  color: rgba(255, 255, 255, 0.8);
  font-size: 14px;
  margin: 0;
}
</style>
