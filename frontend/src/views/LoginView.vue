<template>
    <div id="app">
        <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('assets/img/hero-bg.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign in</h2>
          <form  method="post" @submit.prevent="login"> 
       
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control"  v-model="email"/>
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" v-model="password" />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn buy-tickets scrollto" @click="login">
              Sign in
            </button>

          
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
    </div>
</template>
<script>
//local storage
localStorage.setItem('casr','20')
localStorage.removeItem('casr')
document.cookie=`voiture=audi ;exires=${new Date(2020, 11, 17).toUTCString()}`
document.cookie=`voiture= ;exires=${new Date(0).toUTCString()}`

export default { 



}
</script>


<style scoped>

</style>