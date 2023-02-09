<template>
  <div class="container-fluid">
    <div class="card card-profile">
      <div class="card-avatar">
        <a href="#">
          <img
            :src="congregation.image"
            class="img"
          />
        </a>
      </div>
      <div class="card-body text-center mt-0">
        <h3 class="card-title">{{ congregation.name }}</h3>
        <h6 class="card-category text-gray mt-0">
          {{ congregation.address }}
        </h6>
        <i class="material-icons">person</i>
        <h5 class="card-category text-gray mt-0">

          {{ congregation.pastor }}
        </h5>
        <p class="card-description" style="margin-bottom: -10px">
          {{ congregation.description }}
        </p>
        <!--<a href="#pablo" class="btn btn-rose btn-round">Follow</a>-->
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 col-md-12">
        <div class="card" style="margin-top:25px">
          <div class="card-header card-header-rose">
            <h6 class="card-title text-center">
              Próximos eventos:
            </h6>
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
                  <td class="td-name" @click="goToEvent(event.congregation_id, event.id)" v-bind:class="{'background-passed' : eventPast(event.event_at)}">
                    <a style="font-size: 130%" href="#">{{ event.title }}</a><br/>
                    <span class="badge badge-danger" v-if="eventPast(event.event_at)" style="font-size:15%;margin-right: 10px">
                      <i class="material-icons">schedule</i>
                    </span>
                    <small style="font-size: 90%; color: #999; font-weight: 300">
                      {{ event.event_at }}
                    </small>
                  </td>
                  <td class="td-actions text-right" v-bind:class="{'background-passed' : eventPast(event.event_at)}">
                    <i class="material-icons" style="color: #ff9800"
                      @click="goToEdit(event.congregation_id, event.id)">edit</i>
                    <i class="material-icons" style="padding-left: 10px; color: #f44336"
                      >delete</i>
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
import moment from 'moment'

export default {
  name: 'CongregationView',
  data() {
    return {
      congregation: {},
      events: [],
    };
  },
  methods: {
    eventPast(event_date){
      return moment().isAfter(event_date, 'day')
    },
    getCongregation(uuid) {
      http
        .get("/api/public/congregations/" + uuid)
        .then((response) => {
          this.congregation = response.data.data;
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
    goToEvent(congregation_id, id){
      this.$router.push({
        name: "Event",
        params: { congregation_id: congregation_id, id: id },
      });
    },
    goToEdit(congregation_id, id){
      this.$router.push({
        name: "EventForm",
        params: { congregation_id: congregation_id, id: id },
      });
    },
  },
  mounted() {
    this.getCongregation(this.$route.params.uuid);
    this.getEvents(this.$route.params.id);
  },
};
</script>
<style scoped>
.card-title {
  color: #3c4858;
  text-decoration: none;
}
a {
  color: #ec407a;
  text-decoration: none;
}
.background-passed{
  background-color: lavenderblush;
}
table{
  border-collapse: collapse;
}
.table>:not(:first-child) {
  border-top: 0px;
}
</style>
