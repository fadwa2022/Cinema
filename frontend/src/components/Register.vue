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
          <h2 class="fw-bold mb-5">Sign up now</h2>
          <form @submit.prevent="submitForm" >
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-12 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" v-model="formData.name" />
                  <label class="form-label" for="form3Example1">name</label>
                </div>
              </div>
         
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" v-model="formData.email" />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" v-model="formData.password" />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <!-- Submit button -->
            <button  class="btn buy-tickets scrollto" >
              Sign up
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
import axios from 'axios';
export default {

  el: '#app',
  data () {
    return {
      counter :0,
      formData: {
        name: '',
        email: '',
        password: ''
      }
    }
  },
  methods: {
     submitForm() {
      
        console.log(this.formData)
         axios.post('http://localhost/cinema/backend/api/user/create.php', this.formData)
           this.$router.push({name:'Login'})

    
    }
  }
}
</script>


<style scoped>

</style>