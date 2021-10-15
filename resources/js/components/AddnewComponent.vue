 
 <template>
<div class="container bg-white"><br/><br/>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li></ul><br/>


  <h6>Booking Management</h6>

   <div class="row">
  <div class="col-4">
   <div class="card">
      <div class="card-body">
          <p>Select Check In/ Check Out:</p>

<div class="card">
      <div class="card-body">
<v-date-picker title-position="left" is-range v-model="range" />
</div>
</div>
          <br/>
          <div>
         <div class="dropdown">
  <button class="btn btn- light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Available Rooms
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>


             </div>
               </div>
               </div><br>
</div>
  <div class="col-8">
 <div class="card">
  <img class="card-img-top" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><b>Dulux Bed Room</b></h5>
    <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis deserunt numquam ea hic alias dolorem harum vel, iure soluta, itaque qui iste cumque nihil dicta pariatur, doloribus tempore voluptas laborum?
    </p>
    <h5><b>Room Amenities</b></h5>
    <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis deserunt numquam ea hic alias dolorem harum vel, iure soluta, itaque qui iste cumque nihil dicta pariatur, doloribus tempore voluptas laborum?
    </p>
    <a href="#" class="btn btn-primary">Book Now</a><br/><br/>
  </div>
</div>


</div>
</div>
</div>

</template>

<script>
export default {
  data() {
    return {
      range: {
        start: new Date(2020, 0, 10),
        end: new Date(2020, 0, 23),
      },
    };
  },
};
</script>

<style>

</style>

 

