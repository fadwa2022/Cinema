<template>
    <div id="app">
      <!-- ======= Header ======= -->
      <header id="header" class="d-flex align-items-center ">
        <div class="container-fluid container-xxl d-flex align-items-center">
    
          <div id="logo" class="me-auto">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
            <a href="index.html" class="scrollto"><img src="assets/img/logo.png" alt="" title=""></a>
            <h3 class="nav-link scrollto active ">{{name}}</h3>
          </div>
    
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><router-link to="/" class="nav-link scrollto active "><a href="">Home</a></router-link></li>
              <li><router-link to="/#about" class="nav-link scrollto "><a href="">About</a></router-link></li>
              <li><router-link to="/#speakers" class="nav-link scrollto "><a href="">ACTORS</a></router-link></li>
              <li><router-link to="/#venue" class="nav-link scrollto "><a href="">Venue</a></router-link></li>
              <li><router-link to="/#supporters" class="nav-link scrollto "><a href="">Sponsors</a></router-link></li>
              <li><router-link to="/#supporters" class="nav-link scrollto "><a href="">Contact</a></router-link></li>
              <li v-if="!display"><router-link  to="/Login" class="nav-link scrollto "><a href="">Login</a></router-link></li>
              <li v-if="display"><router-link  to="" v-on:click="logout" class="nav-link scrollto "><a href="">Logout</a></router-link></li>
              <li v-if="display"><router-link  to="/Reservation"  class="nav-link scrollto "><a href="">Reservation</a></router-link></li>
              <li v-if="!display"><router-link to="/register" class="nav-link scrollto "><a href="">Register</a></router-link></li>

              <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        <router-link to="/#buy-tickets" class="buy-tickets scrollto">Buy Tickets</router-link>
    
        </div>
      </header><!-- End Header -->
        </div>

</template>

<script>

export default {
  name:'navbar',
  data(){
    return{
      display : sessionStorage.getItem("SESSION"),
      name:'',
      identite:'',
      id:''
    }
  },
  methods:{
    logout(){
    sessionStorage.removeItem("SESSION");
   this.$router.go({name:'Login'})
         this.display = true
  },
  },
 

  mounted(){
    
   let user =JSON.parse(sessionStorage.getItem("SESSION"));
  if(user){
     this.name= user.full_name
    this.identite= user.identifier
    this.identite= user.id
    } 


  
  }

}
 
  
</script>


<style scoped>

</style>
