<template>
  <div>
    <div class="col-12 mt-5" style="padding-right: 0px; padding-left: 0px">
        <div class="card">
            <div class="card-header card-header-rose">
            <h4 class="card-title">Alterar Dados</h4>
            <p class="card-category">Preencha os dados do seu Usuário</p>
            </div>
            <div class="card-body">
            <form @submit.prevent="salvarUser">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating"
                        >Nome de Usuário</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        v-model="user.name"
                    />
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        disabled
                        v-model="user.email"
                    />
                    </div>
                </div>                      
                </div>
                <div class="row">                
                <div class="col-md-2 mt-3">
                    <h4 class="title">Usuário ativo?</h4>
                    <div class="togglebutton">
                    <label>
                        <input
                        type="checkbox"
                        checked=""
                        v-model="user.active"
                        />
                        <span class="toggle"></span> Sim
                    </label>
                    </div>
                </div>
                </div>
                <br />                
                <div class="text-center mt-5">
                <div id="alert_response"></div>                
                <button
                    type="submit"                  
                    class="btn btn-rose pull-center"
                >
                    Atualizar dados
                </button>
                </div>
                <div class="clearfix"></div>
            </form>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
// import { mapGetters, mapState } from "vuex";
import { mapGetters } from "vuex"
import router from '@/router'

export default {
  data() {
    return {
      user: {}
    };
  },
  methods: {    
    alert(message, type){
        var alertPlaceholder = document.getElementById('alert_response')
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
        alertPlaceholder.append(wrapper)
    },
    getUser() {
      this.$http
        .get("/api/user")
        .then((response) => {
            this.user = response.data;
            this.user.active = this.user.active == 1 ? true : false;
        })
        .catch((error) => {
            this.alert('Não foi possível buscar os dados!', 'danger')
          console.log(error);
        });
    },
    salvarUser() {
      if(!this.user.active){
        if(!confirm('Ao inativar seu usuário, não será possível entrar novamente, continuar?')){
          return;
        }
      }
      this.$http
        .put("/api/user/"+this.user.id, this.user)
        .then(() => {
          this.alert('Dados atualizados com sucesso! <p>Faça login novamente...', 'success')
          setTimeout(() => {
            router.push({ name: "Login" });
          }, 2000);
        })
        .catch((error) => {
            this.alert('Não foi possível atualizar os dados!', 'danger')
          console.log(error);
        });
    },
  },
  computed: {
    ...mapGetters(["userIsLogged", "userLoggedName"])
    // ...mapState(["user"]),
  },
  watch: {
    userLoggedName() {
      this.user = this.userLoggedName;
      console.log(this.user);
    },
  },
  mounted() {
    this.getUser();
  },
};
</script>
<style scoped>
.card {
  box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
  border-radius: 6px;
  margin-top: 20px;
  color: #333333;
  background: #fff;
  width: 100%;
  font-size: 0.875rem;
  border: 0;
}
.card-avatar {
  text-align: center;
  max-width: 130px;
  max-height: 130px;
  margin: -50px auto 0;
  border-radius: 50%;
  overflow: hidden;
  padding: 0;
  box-shadow: 0 16px 38px -12px rgb(0 0 0 / 56%),
    0 4px 25px 0px rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(0 0 0 / 20%);
}
.card-avatar img {
  width: 100%;
  height: auto;
}
.btn-round {
  border-radius: 30px;
}
.btn-rose {
  color: #fff;
  background-color: #e91e63;
  border-color: #e91e63;
  box-shadow: 0 2px 2px 0 rgb(233 30 99 / 14%),
    0 3px 1px -2px rgb(233 30 99 / 20%), 0 1px 5px 0 rgb(233 30 99 / 12%);
}
.card-header {
  border-bottom: none;
  background: transparent;
}
.card-title {
  color: #3c4858;
  text-decoration: none;
}
.card-header-rose {
  background: linear-gradient(60deg, #ec407a, #d81b60);
}
.card [class*="card-header-"] .card-title {
  color: #fff;
}
</style>