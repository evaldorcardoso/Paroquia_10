<template>
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header card-header-rose">
          <h4 class="card-title">Seu informativo digital</h4>
          <p class="card-category" v-if="userIsLogged">
            Olá {{ userLoggedName }}
          </p>
          <p class="card-category" v-else>
            Para começar, encontre a sua congregação..
          </p>
        </div>
        <div class="card-body table-responsive">
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Pesquise por nome..."
              aria-label="Pesquisar"
            />
          </form>
          <table class="table table-hover">
            <thead class="text-rose" />
            <tbody style="border-top: 0px">
              <tr v-for="congregation in congregations" :key="congregation.id">
                  <td
                    style="
                      padding: 12px 8px;
                      vertical-align: middle;
                      border-color: #ddd;
                    "
                    @click="goToCongregation(congregation.id)"
                  >
                    <p
                      style="
                        margin-bottom: 5px;
                        color: #e91e63;
                        font-weight: bolder;
                        line-height: 1.5em;
                      "
                    >
                      {{ congregation.name }}
                    </p>
                    <p
                      style="
                        font-size: 85%;
                        margin-bottom: -5px;
                        line-height: 1.5em;
                      "
                    >
                      {{ congregation.address }}
                    </p>
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
import http from "@/http";
import { mapGetters } from "vuex";

export default {
  name: "Home",
  data() {
    return {
      congregations: [],
    };
  },
  methods: {
    getCongregations() {
      http
        .get("/api/public/congregations")
        .then((response) => {
          this.congregations = response.data.data;
          console.log(response.data.data);
          // console.log(this.congregations);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goToCongregation(id){
      this.$router.push({
        name: 'Congregation',
        params: { id: id }
      })
    }
  },
  computed: {
    ...mapGetters(["userIsLogged", "userLoggedName"]),
  },
  mounted() {
    this.getCongregations();
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
#app {
  font-family: "Roboto", "Helvetica", "Arial", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  font-weight: 300;
  line-height: 1.5em;
  background-color: #eee;
  color: #3c4858;
  font-weight: 300;
}
h4 {
  font-size: 1.125rem;
  line-height: 1.4em;
  font-weight: 300;
}

.card {
  box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
  border-radius: 6px;
  margin-top: 20px;
  color: #333333;
  background: #fff;
  width: 100%;
  font-size: 0.875rem;
}
.card-header-rose {
  background: linear-gradient(60deg, #ec407a, #d81b60);
  border-radius: 3px;
  margin-top: -20px;
  padding: 15px;
  box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%),
    0 7px 10px -5px rgb(233 30 99 / 40%);
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
