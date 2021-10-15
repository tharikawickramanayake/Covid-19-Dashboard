<template>

      <div
    :style="{
      'background-image':
        'url( https://image.freepik.com/free-photo/abstract-luxury-gradient-blue-background-smooth-dark-blue-with-black-vignette_1258-48251.jpg',
    }"
  >

    <div class="container"><br><br><br><br>
        <div class="card"><br><br>
  <div class="card-body">
      <div class="card">
  <div class="card-body">
    <form class="form-inline" @submit.prevent>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Search</label>
    <input type="text" class="form-control" id="inputPassword2" v-model="serach_data" placeholder="Search by Local Deaths">
  </div>

    <div class="col-sm">
     <button type="submit" @click="search_data()" class="btn btn-primary mb-2">Search Now</button>  
    </div>
    <div class="col-sm">
     <button type="submit" @click="view_all()" class="btn btn-primary mb-2">View All</button>
    </div>




</form>
  </div>
    </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Local Deaths</th>
      <th scope="col">Local New Deaths</th>
      <th scope="col">Local_Recovered</th>
      <th scope="col">Local Active Cases</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(data,index) in covid_data" :key="index">
      <th>{{data.Local_Deaths}}</th>
      <td>{{data.Local_New_Deaths}}</td>
      <td>{{data.Local_Recovered}}</td>
      <td>{{data.Local_Active_Cases}}</td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" @click="open_update_modal(data)" data-target="#updateModal">Update</button></td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" @click="open_delete_modal(data)" data-target="#deleteModal">Delete</button></td>
    </tr>
  </tbody>
</table>
<!--update modal opne-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form @submit.prevent>
     <div class="card"><br><br>
  <div class="card-body">
  <div class="form-group row"><br><br>

    <label for="exampleInputEmail1 " class="col-sm col-form-label">Local Deaths</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10" v-model="details.Local_Deaths"  id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  </div>
  <div class="form-group row">
    <label for="exampleInputPassword1" class="col-sm col-form-label">Local Total Cases</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10"  v-model="details.Local_Total_Cases" id="exampleInputPassword1">
  </div>
  </div>
    <div class="form-group row">
    <label for="exampleInputPassword1" class="col-sm col-form-label">Local New Deaths</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10" v-model="details.Local_New_Deaths"  id="exampleInputPassword1">
  </div>
  </div>
    <div class="form-group row">
    <label for="exampleInputPassword1" class="col-sm col-form-label">Local Recovered</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10"  v-model="details.Local_Recovered"  id="exampleInputPassword1">
  </div>
  </div>
    <div class="form-group row">
    <label for="exampleInputPassword1"  class="col-sm col-form-label">Local Active Cases</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10" v-model="details.Local_Active_Cases"  id="exampleInputPassword1">
  </div>
  </div>
  <button type="submit" @click="update_details()" class="btn btn-primary">Save Details</button>
  </div></div>
</form>
    </div>
  </div>
</div>
<!--update modal opne-->


<!--delete modal open-->
  <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Are you sure ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" @click="delete_details()" class="btn btn-primary">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--delete modal open-->

    </div>
    </div>
     </div><br><br><br><br><br><br><br><br>
</div>
</template>

<script>

export default {
    data() {
        return {


            covid_data: {},

             serach_data: "",

             update_id: "",

            details:new Form({
                Local_Deaths: "",
                Local_Total_Cases: "",
                Local_New_Deaths: "",
                Local_Recovered: "",
                Local_Active_Cases: "",
            }),

        };
    },

      created() {
        this.get_covid_data();
    },


    methods: {
        get_covid_data() {
            axios
                .get("/api/get_covid_data")
                .then(response => {
                    if (response.status == 200) {
                        this.covid_data = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        search_data() {
                axios
                .get("/api/search_covid_data/" + this.serach_data)
                .then(response => {
                    if (response.status == 200) {
                        this.covid_data = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
         },

         open_update_modal: function(data) {
              this.update_id = data.id;
              this.details.fill(data);
              $('#updateModal').modal('show');
         },

        open_delete_modal: function(data) {
              this.update_id = data.id;
              this.details.fill(data);
         },

         update_details: function() {
             this.details.patch("/api/update_details/" +this.update_id)
                   .then((response) => {
                         if(response.status == 200) {
                             this.covid_data = response.data;
                             this.$toaster.success("Craeated Successs");
                              this.get_covid_data();
                               $('#updateModal').modal('hide');
                         }
                     })
                     .catch((error) => {
                         console.log(error);
                     });
         },
            delete_details: async function() {
                    await axios.delete("/api/delete_details/" +this.update_id)
                        .then((response) => {
                         if(response.status == 200) {
                             this.covid_data = response.data;
                              this.get_covid_data();
                         }
                         $('#deleteModal').modal('hide');
                     })
                     .catch((error) => {
                         console.log(error);
                     });
                 },

         view_all: function() {
              this.get_covid_data();
         },


    },
}

</script>

<style scoped>
/* div {
  background-size: 100%;
  max-width: 100%;
  height: auto;
} */
</style>
