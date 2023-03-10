<template>
  <div id="app">
    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>YOUR RESERVATIONS</h2>
          <p>
          {{name}}
          </p>
          <p>
          {{identite}}
          </p>
        </div>

        <div class="row">
          <div
            v-for="reservation in reservation"
            :key="reservation.id"
            class="col-lg-6"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="card mb-5 mb-lg-0">
              <div class="card-body d-flex " style="height: 12em;margin-left:3em">
                  <div class="text-center" style="
    margin-top: 7em;">
                  <button
                    @click="annuler(reservation.id,reservation.seat )"
                    type="button"
                    class="btn"
                    data-bs-toggle="modal"
                    data-bs-target="#buy-ticket-modal"
                    data-ticket-type="standard-access"
                  >
                Cancel
                  </button>
                </div>
                  <hr />
                <h5 class="card-title text-muted text-uppercase text-center" style="
    margin-top: 5em;">
                  {{ reservation.title }}
                </h5>
                <hr />
                <ul class="fa-ul">
                  <img
                  style="    height: 10em;
"
                    :src="reservation.image"
                    :alt="reservation.title"
                    class="img-fluid "
                    id="img"
                  />
                </ul>
              
              
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
    reservation:[],
      identite:'',
      id:'',
   reserer:{
           id:'',
           reserver:''
      },

      }

      },
 methods:{
     async reservations() {
    console.log(this.id);
            axios
        .get("http://localhost/cinema/backend/api/reservation/read.php", {
          params: {
            costumer: this.id,
          },
          
        })
        .then((response) => {
          // console.log(response.data);
           this.reservation  = response.data;
})
        .catch((error) => console.error(error));

    
    },
 annuler(id,place){
     try {
        axios.delete(`http://localhost/cinema/backend/api/reservation/delete.php?id=${id}`);
  this.reserer.id = place
    this.reserer.reserver =0
    axios.post('http://localhost/cinema/backend/api/places/update.php', this.reserer)
    location.reload();
window.alert('Reservation Cancel successful');
  
      } catch (error) {
        console.error(error);
      }
    }
 },
  mounted() {
    let user =JSON.parse(sessionStorage.getItem("SESSION"));
    this.name= user.full_name
    this.identite= user.identifier
    this.id= user.id
    this.reservations();
  },
};
</script>

