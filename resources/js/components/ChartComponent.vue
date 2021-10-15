<template>
  <div>

  <div class="card">
     <div class="card-body">
        <input class="form-control col-6 form-control-lg" type="text" v-model="chart.income" placeholder="income">
        <br>
        <button @click="add_data()" class="btn btn-primary">INSERT</button>
     </div>

  </div>
  <br><br>
    <div class="card">
        <div class="card-body">
             <apexchart width="500" type="bar" :options="chartOptions" :series="series"></apexchart>
        </div>
  </div>
   </div>


</template>

<script>
export default {

    created(){
        this.get_chart_data();
    },


    data: function() {
      return {
         chart:new Form({
               income:"",


         }),

         chart_data:null,

        chartOptions: {
          chart: {
            id: 'vuechart-example'
          },
          xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998,1999]
          }
        },
        series: [{
          name: 'series-1',
          data: [30, 40, 35, 50, 49, 60, 70, 91,48]
        }]
      }
    },

    methods:{
        add_data(){
            this.chart.post("/api/add_user_data")
        }
    },

    get_chart_data() {
        axios.get("/api/get_chart_data")
        .then((response)=>{
            if((response.status == 200),{
            this:chart_data = response.data
            });
        })
        .catch((error)=>{
            console.log(error);
        });
    },

    computed: {


        dataSeries(){

        if (this.chart_data == null) return [];
        let newArray =this.chart_data.nap((obj)=>{
            return obj.amount;
        });
        let series =[{
            name: 'series-1',
            data: newArray,
        }]

        return series;

        },


    },


};

</script>


<style>

</style>
