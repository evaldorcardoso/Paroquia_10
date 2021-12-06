<template>
  <div class="container-fluid">
    <div v-if="errorMessage" class="alert alert-danger text-center">      
      <span>{{ errorMessage }}</span>
    </div>
    <form @submit.prevent="efetuarLogin" class="form">
      <div class="card card-login card hidden">
        <div class="card-header card-header-rose text-center">
          <h4 class="card-title">Área administrativa</h4>
        </div>
        <div class="card-body">
          <span class="bmd-form-group">
            <div class="input-group">
              <input
                id="entrar_email"
                type="email"
                email="true"
                class="form-control"
                placeholder="Email..."
                v-model="user.email"
              />
            </div>
          </span>
          <span class="bmd-form-group">
            <div class="input-group mt-4">
              <input
                id="entrar_senha"
                type="password"
                class="form-control"
                placeholder="Senha..."
                v-model="user.password"
              />
            </div>
          </span>
        </div>
        <div class="card-footer text-center">
          <div class="d-grid gap-2 col-6 mx-auto">
            <button id="but_entrar" class="card-footer text-center">
              <a class="btn btn-rose btn-link btn-lg">Entrar</a>
            </button>
            <a onclick="muda_tela('principal');">VOLTAR</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
// import http from '@/http'

export default {
  name: 'Login',
  data() {
    return {
      user: { email: 'admin@admin.com', password: '123456'},
      errorMessage: ''
    }
  },
  methods: {
    efetuarLogin(){
      this.$store
        .dispatch('doLogin', this.user)
        .then(() => {
          this.$router.push({ name: 'Home' })
          this.errorMessage = ''
        })
        .catch(error => {
          // console.log(error.response);
          this.errorMessage = error.response.data.message ? error.response.data.message : 'Erro ao entrar, tente novamente';
        });
    }
  }
}
</script>

<style scoped>
.card-header:first-child {
  border-radius: 3px;
  margin-top: -20px;
  padding: 15px;
}
.form-control {
  border: 0;
  height: 36px;
}
.form-control,
.is-focused .form-control {
  background-image: linear-gradient(
      to top,
      #ec407a 2px,
      rgba(156, 39, 176, 0) 2px
    ),
    linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
}
#but_entrar {
  background-color: transparent;
}
.btn-rose {
  background-color: transparent;
  color: #e91e63;
  box-shadow: none;
  text-decoration: none;
  border: 0;
  padding: 2px;
  margin-top: 30px;
  margin-bottom: 30px;
}
.card-footer {
  border: 0;
  background-color: transparent;
}
.alert{
  border: 0;
  border-radius: 3px;
  position: relative;
  padding: 20px 15px;
  line-height: 20px;
}
.alert.alert-danger{
  background-color: #f55145;
  color: #ffffff;
}
</style>
