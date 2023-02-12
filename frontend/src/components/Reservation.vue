<template>
  <div id="app">
    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>YOUR RESERVATIONS</h2>
          <p>
            Velit consequatur consequatur inventore iste fugit unde omnis eum
            aut.
          </p>
        </div>

        <div class="row">
          <div
            v-for="hall in hall"
            :key="hall.id"
            class="col-lg-4"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">
                  {{ hall.title }}
                </h5>
                <hr />
                <ul class="fa-ul">
                  <img
                    :src="hall.image"
                    :alt="hall.title"
                    class="img-fluid"
                    id="img"
                  />
                </ul>
                <hr />
                <div class="text-center">
                  <button
                    @click="places(hall.id)"
                    type="button"
                    class="btn"
                    data-bs-toggle="modal"
                    data-bs-target="#buy-ticket-modal"
                    data-ticket-type="standard-access"
                  >
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- End Buy Ticket Section -->
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      hall: [],
    };
  },
  methods: {
    getDataFromAPI() {
      axios
        .get("http://localhost/cinema/backend/api/halls/read.php")
        .then((response) => {
          this.hall = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  mounted() {
    this.getDataFromAPI();
  },
};
</script>

<style scoped></style>
