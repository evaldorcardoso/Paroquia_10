<template>
  <div class="container-fluid">
    <div class="card card-stats">
        <div class="card-header card-header-icon">
            <div class="card-icon card-header-rose">
                <i class="material-icons">date_range</i>
            </div>
            <p class="card-category">{{ event.congregation ? event.congregation.name : '' }}</p>
            <h6 style="color:gray;text-transform: none;font-weight:100">{{ formatDate(event.event_at) }}</h6>
        </div>
        <div class="card-body" style="text-align: left">
            <div class="col">
              <div class="row">
                <h3 class="card-description">
                    {{ event.title }}
                </h3>     
              </div>
              <div class="row">
                <p class="card-description">
                    {{ event.description }}
                </p>     
              </div>
              <div class="row">
                <i class="material-icons" style="float:left;width:auto">bookmarks</i>
                <h4 style="float:right;width:auto;margin-left:-15px;">Leituras</h4>
              </div>
              <div class="row">
                <p class="card-description">
                    {{ event.readings }}
                </p>
              </div>              
            </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <i class="material-icons" style="float:left;width:auto">place</i>
            <h4 style="float:right;width:auto;margin-left:-15px;">Endereço</h4>
          </div>
          <div class="row">
            <p class="card-description">
              {{ event.address }}
            </p>
          </div>
        </div>
    </div>
  </div>
</template>
<script>
import http from "@/http"
import moment from 'moment'

export default {
  data() {
    return {
      event: {},
    };
  },
  methods: {
    getEvent(congregation_id, id) {
      http
        .get("/api/public/congregation/" + congregation_id + "/events/" + id)
        .then((response) => {
          this.event = response.data.data;
          console.log(response.data.data);
          // console.log(this.congregations);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getEvents(congregation_id) {
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
    formatDate(value){      
      return moment(value).locale('pt-br').format('lll')
    },
  },
  mounted() {
    this.getEvent(this.$route.params.congregation_id, this.$route.params.id);
  },
};
</script>
<style scoped>
#title {
  color: #3c4858;
  text-decoration: none;
}
.card-header{
  text-align: right;
}
.card-icon{
  float: left;
  border-radius: 3px;
  padding: 5px;
  margin-top: -20px;
  margin-left: 2px;
}
.card-header.card-header-icon i{
  font-size: 36px;
  line-height: 56px;
  width: 56px;
  height: 56px;
  text-align: center;
  color: #fff;
}
.card-stats .card-header .card-category:not([class*="text-"]){
  color: #ec407a;
  font-size: 20px;
  font-weight: 500;
  margin-top: 10px;
  display: block;
}
a {
  color: #ec407a;
  text-decoration: none;
}
</style>