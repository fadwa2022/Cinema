<template>
  <div class="home">
    <Hero/>
    <About/>
    <Speakers/>
    <Schedule/>
    <Venue/>
    <Hotels/>
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
import Speakers from '@/components/Speakers'
import Schedule from '@/components/Schedule'
import Venue from '@/components/Venue'
import Hotels from '@/components/Hotels'
import Sponsors from '@/components/Sponsors'
import Subscribe from '@/components/Subscribe'
import Ticket from '@/components/Ticket'
import Contact from '@/components/Contact'

export default {
  name: 'HomeView',
  components: {
   Hero,
   About,
   Speakers,
   Schedule,
   Venue,
   Hotels,
   Sponsors,
   Subscribe,
   Ticket,
   Contact
  },
}
</script>
