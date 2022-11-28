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
              <tr v-for="congregation in congregations" :key="congregation.uuid">
                  <td
                    style="
                      padding: 12px 8px;
                      vertical-align: middle;
                      border-color: #ddd;
                    "
                    @click="goToCongregation(congregation.uuid)"
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
        })
        .catch((error) => {
          console.log(error);
        });
    },
    goToCongregation(uuid){
      this.$router.push({
        name: 'Congregation',
        params: { uuid: uuid }
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

<style scoped>

</style>
