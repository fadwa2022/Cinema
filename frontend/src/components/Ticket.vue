<template>
    <div id="app">
             <!-- ======= Buy Ticket Section ======= -->
        <section id="buy-tickets" class="section-with-bg">
          <div class="container" data-aos="fade-up">
    
            <div class="section-header">
              <h2>Buy Tickets</h2>
              <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
            </div>
    
            <div class="row" >
              <div v-for="hall in hall" :key="hall.id" class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">{{ hall.title }}</h5>
                    <h6 class="card-price text-center">$15</h6>
                    <hr>
                    <ul class="fa-ul">
                  <img :src="hall.image" :alt="hall.title" class="img-fluid" id="img">
                    </ul>
                    <hr>
                    <div class="text-center">
                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
    
          </div>
    
          <!-- Modal Order Form -->
          <div id="buy-ticket-modal" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Buy Tickets</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="#">
                    <div class="form-group">
                      <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                    </div>
                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                    </div>
                    <div class="form-group mt-3">
                      <select id="ticket-type" name="ticket-type" class="form-select">
                        <option value="">-- Select Your Ticket Type --</option>
                        <option value="standard-access">Standard Access</option>
                        <option value="pro-access">Pro Access</option>
                        <option value="premium-access">Premium Access</option>
                      </select>
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" class="btn">Buy Now</button>
                    </div>
                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
    
        </section><!-- End Buy Ticket Section -->
    
    </div>
</template>
<script>

import axios from 'axios';
 
export default {
  data() {
    return {
      hall: []
    };
  },
 methods: {
    getDataFromAPI() {
      axios.get('http://localhost/cinema/backend/api/halls/read.php')
        .then(response => {
          this.hall = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
  mounted() {
    this.getDataFromAPI();
  }
}

</script>


<style scoped>

</style>