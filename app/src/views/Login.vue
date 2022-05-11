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
            <a class="btn btn-rose btn-link btn-lg" @click="signInWithFirebase()">Entrar com Google</a>
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
import { initializeApp } from "firebase/app";
import { GoogleAuthProvider, getAuth, signInWithPopup } from 'firebase/auth'

export default {
  setup() {
    // const user = ref({
    //   email: 'admin@admin.com',
    //   password: '123456',
    // })

    const firebaseConfig = {
        apiKey: "AIzaSyD3jX8MJVpo-U01g7IafuHwgO7pRB96uBA",
        authDomain: "paroquia-10.firebaseapp.com",
        databaseURL: "https://paroquia-10.firebaseio.com",
        projectId: "paroquia-10",
        storageBucket: "paroquia-10.appspot.com",
        messagingSenderId: "761038367071",
        appId: "1:761038367071:web:bfb2f50a4b501ed565eeea",
    };

    initializeApp(firebaseConfig);

    const email = ref('admin@admin.com')
    const password = ref('password')
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

    function signInWithFirebase() {
      const provider = new GoogleAuthProvider();
      const authp = getAuth();

      signInWithPopup(authp, provider)
        .then(async (result) => {
        //   const credential = GoogleAuthProvider.credentialFromResult(result);
        //   const token = credential.accessToken;
          // The signed-in user info.
          const user = result.user;
          console.log(user);
          console.log('dispatching login');
          await store.dispatch('doFirebaseLogin', { user: user })
          .then(() => {
            router.push({ name: 'Home' })
            errorMessage.value = null
          })
          .catch(error => {
          // console.log(error.response);
          console.log(error);
          errorMessage.value = error.response.data.message ? error.response.data.message : 'Erro ao entrar, tente novamente';
        });
        //   console.log(token);
        //   console.log(credential);
        //   console.log(result);

        }).catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            const email = error.email;
            const credential = GoogleAuthProvider.credentialFromError(error);
            console.log({ errorCode, errorMessage, email, credential });
        });
    }

    return { handleSubmit, email, password, errorMessage, signInWithFirebase }
  },
}
</script>

<style scoped>
#but_entrar {
  background-color: transparent;
}
</style>
