<template>
  <div class="home">
    <Reservation/>
  </div>
</template>

<script>
// @ is an alias to /src
import Reservation from '@/components/Reservation';


export default {
  name: 'ReservationView',
  components: {
   Reservation,
  },
}
</script>
