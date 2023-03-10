<template>
  <div id="app">
    
    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        
        <div class="section-header">
          <h2>Buy Tickets</h2>
          <p>
            Velit consequatur consequatur inventore iste fugit unde omnis eum
            aut.
          </p>
        </div>
       <form>
            <div class="form-group">
                <label for="datePicker">Sélectionnez une date :</label>
                <input type="date" class="form-control" id="datePicker" name="datePicker" v-on:change="movie($event.target.value)">
            </div>
        </form>
        
<br>
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
                <h6 class="card-price text-center">$15</h6>
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

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body d-flex-colum  justify-content-between">
    <div  v-for="place in place" :key="place.id"   
               class="col-12" >      
              
                 <h1 class="max-w-2xl mb-2 font-light text-gray-500 lg:mb-2 md:text-lg lg:text-xl dark:text-gray-400">{{place.id}}</h1>

                  <img
                  v-if="place.reserver == 1"
                    class="mr-8"
                    src="assets/img/chair (1).png"
                    alt="red"
                  />
              
                   <img
                   v-else
                   @click="book(place.id,place.movie)"
                    class="mr-8"
                    src="assets/img/chair (2).png"
                    alt="red"
                  />
                </div>
          
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
      place: [],
      DATA:{
        costumer:'',
        seat:'',
        hall:'',
        movie:''

      },
      reserer:{
           id:'',
           reserver:''
      },
      show: false,
      message: ''
    };
  },
  methods: {
    getDataFromAPI() {
      axios
        .get("http://localhost/cinema/backend/api/movies/read.php")
        .then((response) => {
          // console.log(response.data)

          this.hall = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    places(id) {
            axios
        .get("http://localhost/cinema/backend/api/places/read_single.php", {
          params: {
            movie: id,
          },
          
        })
        .then((response) => {
          // console.log(response.data);
          this.place = response.data;
})
        .catch((error) => console.error(error));
    },
    movie(Mdate) {
      const selectedDate = new Date(Mdate);
      const today = new Date();
      const dayOfWeek = selectedDate.getDay();
      
      if (dayOfWeek === 0) {
        alert("Vous ne pouvez pas sélectionner un dimanche.");
        return;
      }
      
      if (selectedDate < today) {
        alert("Le cinéma est fermé le dimanche.");
        return;
      }
      
      console.log(Mdate);
      axios
        .get("http://localhost/cinema/backend/api/movies/read_single.php", {
          params: {
            Mdate: Mdate,
          },
          
        })
.then(response => {
  console.log(response.data);
   this.hall = response.data;

})
.catch(error => {
  console.log(error);
}) },
  book(place,movie){
      let sessionuser = JSON.parse(sessionStorage.getItem("SESSION"));
      this.DATA.costumer=sessionuser.id
      this.DATA.seat=place
      // this.DATA.hall=hall
      this.DATA.movie=movie
    axios.post('http://localhost/cinema/backend/api/reservation/create.php', this.DATA)
    this.reserer.id = place
    this.reserer.reserver = 1
    axios.post('http://localhost/cinema/backend/api/places/update.php', this.reserer)
    location.reload();
  window.alert('Reservation successful');
}
  },
  mounted() {
    this.getDataFromAPI();

  },
};
</script>

<style scoped></style>
