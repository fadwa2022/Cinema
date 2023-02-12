<template>
  <div id="app">
    <!-- Section: Design Block -->
    <section class="text-center">
      <!-- Background image -->
      <div
        class="p-5 bg-image"
        style="background-image: url('assets/img/hero-bg.jpg'); height: 300px"
      ></div>
      <!-- Background image -->

      <div
        class="card mx-4 mx-md-5 shadow-5-strong"
        style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
        "
      >
        <div class="card-body py-5 px-md-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-5">Sign in</h2>
              <form @submit.prevent="submitForm">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input
                    type="email"
                    id="form3Example3"
                    class="form-control"
                    v-model="formData.email"
                  />
                  <label class="form-label" for="form3Example3"
                    >Email address</label
                  >
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input
                    type="password"
                    id="form3Example4"
                    class="form-control"
                    v-model="formData.password"
                  />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn buy-tickets scrollto">
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
<script  >
import axios from "axios";

export default {
  data () {
    return {
      formData: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
     async submitForm() {
      try {
        const response = axios.post('http://localhost/cinema/backend/api/user/read_single.php', this.formData)
        const data= await response;
        const session=data.data;
   sessionStorage.setItem("SESSION", JSON.stringify(session));

// Récupérer le tableau depuis sessionStorage
let sessionuser = JSON.parse(sessionStorage.getItem("SESSION"));

console.log(sessionuser); 
   this.$router.go({name:'home'})
  } catch (error) {
        console.error(error)
      }
    }
  },

}
</script>

<style scoped></style>























