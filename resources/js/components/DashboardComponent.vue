<template>
  <div
    :style="{
      'background-image':
        'url(https://image.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg',
    }"
  >
    <div class="col">
      <br /><br />
      <div class="card">
        <div class="card-body">
          <br /><br />
          <h4 style="text-align: center; color:darkblue;">Update Time</h4>
          <h4 style="text-align: center; color:red; ont-weight:1500px;">
            {{ list.update_date_time }}
          </h4>
        </div>
      </div>
    </div>
    <br /><br /><br />
    <div class="row">
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">

            <h4 style="text-align: center; color:darkblue">Local Total Cases</h4>
            <h4 style="text-align: center; color:#8080ff">
              {{ list.local_total_cases }}
            </h4>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color:darkblue">Local Deaths</h4>
            <h3 style="text-align: center; color:#8080ff ;">
              {{ list.local_deaths }}
            </h3>
          </div>
        </div>
        <br /><br />
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">Local New Deaths</h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.local_new_deaths }}
            </h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">Local Recovered</h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.local_recovered }}
            </h3>
          </div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">
              Total PCR Testing count
            </h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.total_pcr_testing_count }}
            </h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">Local Active Cases</h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.local_active_cases }}
            </h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">Global Deaths</h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.global_deaths }}
            </h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="height: 120px">
          <div class="card-body">
            <h4 style="text-align: center; color: darkblue">Global Total Cases</h4>
            <h3 style="text-align: center; color:#8080ff">
              {{ list.global_total_cases }}
            </h3>
          </div>
        </div>
      </div>
    </div>
    <br /><br />

  <div class="card" style="width:50rem;">
  <div class="card-body">

  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">PCR Count</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="index in list.daily_pcr_testing_data" :key="index">
          <td>{{ index.date }}</td>
          <td>{{ index.pcr_count }}</td>
        </tr>
      </tbody>

    </table>
    </div>
    </div>

    </div>

</template>

<script>
export default {
  data() {
    return {
      list: {},
    };
  },

  mounted() {
    axios
      .get("https://hpb.health.gov.lk/api/get-current-statistical")
      .then((response) => {
        this.list = response.data.data;
      });
  },
};
</script>

<style scoped>
div {
  background-size: 100%;
}

.card{
  margin-left: auto;
  margin-right: auto;
  card-shadow: 2px 2px;
}
</style>


