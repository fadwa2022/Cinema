      <template>
       <div id="app">
          <!-- ======= Speakers Section ======= -->
        <section id="speakers">
          <div class="container" data-aos="fade-up">
            <div class="section-header">
              <h2>Actors</h2>
            </div>
    
            <div class="row">
              <div class="col-lg-4 col-md-6" v-for="actor in actors" :key="actor.id">
                <div class="speaker" data-aos="fade-up" data-aos-delay="100" >
                  <img :src="actor.image" :alt="actor.name" class="img-fluid" id="img">
                  <div class="details">
                    <h3><a href="speaker-details.html">{{ actor.name }}</a></h3>
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        </section><!-- End Speakers Section -->
        </div> 
      </template>
     
<script>
 import axios from 'axios';
 
export default {
  data() {
    return {
      actors: []
    };
  },
 methods: {
    getDataFromAPI() {
      axios.get('http://localhost/cinema/backend/api/actors/read.php')
        .then(response => {
          this.actors = response.data;
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
#img{
  height:20em !important;
}
</style>