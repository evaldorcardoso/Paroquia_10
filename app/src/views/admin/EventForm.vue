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
            <form id="form_evento" style="">              
              <div class="row">
                <div class="col">
                  <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating">Título do evento</label>
                    <input type="text" class="form-control" v-model="event.title">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group bmd-form-group is-filled">
                    <label class="bmd-label-floating">Data do Evento</label>
                    <input type="datetime-local" v-model="event.event_at" class="form-control">
                  </div>
                </div>
              </div>              
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-static">Descrição do evento</label>
                      <textarea class="form-control" rows="4" v-model="event.description"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Local do evento</label>
                    <input type="text" v-model="event.address" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-static">Leituras</label>
                      <textarea class="form-control" v-model="event.readings" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>              
              <button type="submit" onclick="salvarEvento();" class="btn btn-rose pull-right">SALVAR<div class="ripple-container"></div></button>
            </form>
        </div>
        <div class="card-footer">
          <!-- {{ event }} -->
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
          this.event.event_at = moment(this.event.event_at).format("YYYY-MM-DDTHH:mm");
        //   console.log(response.data.data);
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
.form-control:focus, .bmd-form-group.is-focused .form-control {
    background-size: 100% 100% 100% 100%;
    transition-duration: 0.3s;
    box-shadow: none;
}
.btn.btn-rose {
    color: #fff;
    background-color: #e91e63;
    border-color: #e91e63;
    box-shadow: 0 2px 2px 0 rgb(233 30 99 / 14%), 0 3px 1px -2px rgb(233 30 99 / 20%), 0 1px 5px 0 rgb(233 30 99 / 12%);
}
</style>