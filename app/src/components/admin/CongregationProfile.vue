<template>
  <div>
    <div class="col-12 mt-5" style="padding-right: 0px; padding-left: 0px">
      <div class="card card-profile" style="margin-bottom: 5px">
        <div class="card-avatar">
          <a href="#">
            <img
              id="img_congregacao"
              src="https://www.paroquia10.com/images/icone_transp.png"
            />
          </a>
        </div>
        <div
          class="card-body image-preview-input text-center"
          style="margin-top: 0"
        >
          <a
            href="#foto"
            class="btn btn-rose btn-round image-preview-input-title"
            onclick="document.getElementById('imagec').click()"
            >Alterar Foto</a
          >
          <input
            id="imagec"
            type="file"
            accept="image/*"
            name="imagec"
            style="display: none"
          />
          <span class="bmd-form-group"
            ><input
              id="congregacao_imagem"
              type="text"
              class="form-control image-preview-filename"
              disabled="disabled"
              style="display: none"
          /></span>
          <!-- don't give a name === doesn't send on POST/GET  -->
        </div>
      </div>
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-header card-header-rose">
            <h4 class="card-title">Alterar Dados</h4>
            <p class="card-category">Preencha os dados da Congregação</p>
          </div>
          <div class="card-body">
            <form @submit.prevent="salvarCongregacao">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating"
                      >Nome da Congregação</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="congregation.name"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating">Endereço</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="congregation.address"
                    />
                  </div>
                </div>                      
              </div>
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating">Pastor</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="congregation.pastor"
                    />
                  </div>
                </div>
                <div class="col-md-2 mt-3">
                  <h4 class="title">Congregação Ativa?</h4>
                  <div class="togglebutton">
                    <label>
                      <input
                        type="checkbox"
                        checked=""
                        v-model="congregation.active"
                      />
                      <span class="toggle"></span> Sim
                    </label>
                  </div>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-static"
                        >Descrição da Congregação</label
                      ><br />
                      <textarea
                        class="form-control"
                        placeholder="Informe algum dado adicional para identificar a sua Congregação"
                        rows="5"
                        v-model="congregation.description"
                      ></textarea>
                    </div>
                  </div>
                </div>
              </div>
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
  </div>
</template>
<script>
import { mapGetters, mapState } from "vuex";

export default {
  data() {
    return {
      congregation: {},
    };
  },
  methods: {
    alert(message, type){
        var alertPlaceholder = document.getElementById('alert_response')
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
        alertPlaceholder.append(wrapper)
    },
    getCongregation() {
      this.$http
        .get("/api/user/congregations")
        .then((response) => {
          this.congregation = response.data.data[0];
          this.congregation.active = this.congregation.active == 1 ? true : false;
        })
        .catch((error) => {
          this.alert('Não foi possível buscar os dados!', 'danger')
          console.log(error);
        });
    },
    salvarCongregacao() {
      this.$http
        .put("/api/user/congregations/"+this.congregation.id, this.congregation)
        .then(() => {
          this.alert('Dados atualizados com sucesso!', 'success')
        })
        .catch((error) => {
          this.alert('Não foi possível atualizar os dados!', 'danger')
          console.log(error);
        });
    },
  },
  computed: {
    ...mapGetters(["userIsLogged", "userLoggedName"]),
    ...mapState(["user"]),
  },
  watch: {
    userLoggedName() {
      this.user = this.userLoggedName;
      console.log(this.user);
    },
  },
  mounted() {
    this.getCongregation();
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