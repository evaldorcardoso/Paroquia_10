<template>
  <div class="container-fluid">
    <div class="card card-profile">
      <div class="card-avatar">
        <a href="#">
          <img
            :src="'https://paroquia10.com/images/' + congregation.image"
            class="img"
          />          
        </a>
      </div>
      <div class="card-body text-center mt-0">
        <h6
          class="card-category text-gray mt-0"
        >
          {{congregation.address}}
        </h6>
        <h4 class="card-title">{{congregation.name}}</h4>
        <h5
          class="card-category text-gray mt-0"
        >
        {{congregation.pastor}}
        </h5>
        <p class="card-description" style="margin-bottom: -10px">
          {{congregation.description}}
        </p>
        <!--<a href="#pablo" class="btn btn-rose btn-round">Follow</a>-->
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-rose">
            <h5 class="card-title text-center" style="font-size: 98%">
              Próximos eventos desta congregação:
            </h5>
            <p class="card-category"></p>
          </div>
          <div class="card-body table-responsive">
            <center>
              <div id="status_eventos" style="display: none"></div>
            </center>
            <table class="table table-hover">
              <thead class="text-rose"></thead>
              <tbody>
                <tr v-for="event in events" :key="event.id">
                  <td class="td-name">
                    <a
                      style="font-size: 130%"
                      href="#"
                      >{{event.title}}</a
                    ><br /><span class="badge badge-danger"
                      ><i class="material-icons">warning</i></span
                    ><small
                      style="font-size: 90%; color: #999; font-weight: 300"
                      >{{event.event_at}}</small
                    >
                  </td>
                  <td class="td-actions text-right">
                    <i
                      class="material-icons"
                      style="color: #ff9800"
                      >edit</i
                    ><i
                      class="material-icons"
                      style="padding-left: 10px; color: #f44336"
                      >delete</i
                    >
                  </td>
                </tr>                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import http from "@/http";

export default {
    data() {
        return {
            congregation: {},
            events: [],
        };
    },
  methods: {
    getCongregation(id) {
      http
        .get("/api/public/congregations/" + id)
        .then((response) => {
          this.congregation = response.data.data;
          console.log(response.data.data);
          // console.log(this.congregations);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getEvents(congregation_id){
        http
            .get("/api/public/congregation/" + congregation_id + "/events")
            .then((response) => {
                console.log(response.data.data);
                this.events = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
    goToCongregation(id) {
      this.$router.push({
        name: "Congregation",
        params: { id: id },
      });
    },
  },
  mounted() {
    this.getCongregation(this.$route.params.id);
    this.getEvents(this.$route.params.id);
  },
};
</script>
<style scoped>
.card {
  box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
  border-radius: 6px;
  margin-top: 10px;
  color: #333333;
  background: #fff;
  width: 100%;
  font-size: 0.875rem;
  border: 0;
}
.card-avatar {
  text-align: center;
  max-width: 110px;
  max-height: 110px;
  margin: -30px auto 0;
  border-radius: 50%;
  overflow: hidden;
  padding: 0;
  box-shadow: 0 16px 38px -12px rgb(0 0 0 / 56%),
    0 4px 25px 0px rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(0 0 0 / 20%);
    background: #fff;
}
.card-avatar img {
  width: 100%;
  height: auto;
}
.text-gray {
  color: #999999 !important;
}
.card-title {
  color: #3c4858;
  text-decoration: none;
}
.card [class*="card-header-"] .card-title{
    color: #fff;
}
table{
    border-collapse: separate;
}
.table>tbody>tr {
    position: relative;
}
a {
    color: #ec407a;
    text-decoration: none;
}
.badge-danger {
    color: #ffffff;
    background-color: #f44336;
}
.badge {
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 75%;
    font-weight: 500;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}
.table>tbody>tr>td{
    padding: 12px 8px;
    vertical-align: middle;
    border-color: #ddd;
}
.text-right{
    text-align: right;
}
</style>