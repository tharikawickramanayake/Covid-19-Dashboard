<template>
    <div
    :style="{
      'background-image':
        'url( https://image.freepik.com/free-photo/abstract-luxury-gradient-blue-background-smooth-dark-blue-with-black-vignette_1258-48251.jpg',
    }"
  >

<div class="mx-auto" style="width: 500px;"><br><br>
<form @submit.prevent>
     <div class="card"><br><br>
  <div class="card-body">
  <div class="form-group row"><br><br>

    <label for="exampleInputEmail1 " class="col-sm col-form-label">Local Deaths</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10" v-model="details.Local_Deaths" id="exampleInputEmail1" aria-describedby="emailHelp">
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
    <input type="text" class="form-control col-10"  v-model="details.Local_New_Deaths" id="exampleInputPassword1">
  </div>
  </div>
    <div class="form-group row">
    <label for="exampleInputPassword1" class="col-sm col-form-label">Local Recovered</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10"  v-model="details.Local_Recovered" id="exampleInputPassword1">
  </div>
  </div>
    <div class="form-group row">
    <label for="exampleInputPassword1"  class="col-sm col-form-label">Local Active Cases</label>
     <div class="col-sm">
    <input type="text" class="form-control col-10"  v-model="details.Local_Active_Cases" id="exampleInputPassword1">
  </div>
  </div>
  <button type="submit" @click="add_details()" class="btn btn-primary">Add Details</button>
  </div></div>
</form><br><br><br>
</div>
</div>
</template>



<script>
export default {

    data() {
        return {
            details:new Form({
                Local_Deaths: "",
                Local_Total_Cases: "",
                Local_New_Deaths: "",
                Local_Recovered: "",
                Local_Active_Cases: "",
            }),
        }
    },

    methods:{
        add_details() {
           this.details.post("/api/add_details")
                  .then(response => {
                    if (response.status == 200) {
                        this.$toaster.success("Craeated Successs");
                    }
                    this.details.reset();
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },

}

</script>


<style scoped>
div {
  background-size: 100%;
  max-width: 100%;
  height: auto;
}

</style>
