<template>
  <div class="home">
    <Hero/>
    <About/>
    <Actors/>
    <Venue/>
    <Sponsors/>
    <Subscribe/>
    <Ticket/>
    <Contact/>
  </div>
</template>

<script>
// @ is an alias to /src
import Hero from '@/components/Hero';
import About from '@/components/About';
import Actors from '@/components/Actors'
import Venue from '@/components/Venue'
import Sponsors from '@/components/Sponsors'
import Subscribe from '@/components/Subscribe'
import Ticket from '@/components/Ticket'
import Contact from '@/components/Contact'

export default {
  name: 'HomeView',
  components: {
   Hero,
   About,
   Actors,
   Venue,
   Sponsors,
   Subscribe,
   Ticket,
   Contact
  },
}
</script>
