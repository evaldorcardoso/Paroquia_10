<template>
  <div class="container-fluid">
    <div v-if="errorMessage" class="alert alert-danger alert-dismissible text-center">      
      <span>{{ errorMessage }}</span>
      <button type="button" class="close" @click="errorMessage = null">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form @submit.prevent="handleSubmit" class="form">
      <div class="card card-login card hidden">
        <div class="card-header card-header-rose text-center">
          <h4 class="card-title">Área administrativa</h4>
        </div>
        <div class="card-body">
          <span class="bmd-form-group">
            <div class="input-group">
              <input
                id="entrar_email" type="email" email="true" class="form-control"
                placeholder="Email..." v-model="email"
              />
            </div>
          </span>
          <span class="bmd-form-group">
            <div class="input-group mt-4">
              <input
                id="entrar_senha" type="password" class="form-control"
                placeholder="Senha..." v-model="password"
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
import { ref } from 'vue'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

export default {
  setup() {
    // const user = ref({
    //   email: 'admin@admin.com',
    //   password: '123456',
    // })
    const email = ref('admin@admin.com')
    const password = ref('123456')
    const errorMessage = ref(null)

    const store = useStore()
    const router = useRouter()

    const handleSubmit = async () => {
      await store
        .dispatch('doLogin', { email: email.value, password: password.value })
        .then(() => {
          router.push({ name: 'Home' })
          errorMessage.value = null
        })
        .catch(error => {
          // console.log(error.response);
          console.log(error);
          errorMessage.value = error.response.data.message ? error.response.data.message : 'Erro ao entrar, tente novamente';
        });
    }
    
    return { handleSubmit, email, password, errorMessage }
  },
}
</script>

<style scoped>
#but_entrar {
  background-color: transparent;
}
</style>
