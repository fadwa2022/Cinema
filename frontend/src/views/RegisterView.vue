<template>
  <div class="home">
    <Register/>
  </div>
</template>

<script>
// @ is an alias to /src
import Register from '@/components/Register';


export default {
  name: 'RegisterView',
  components: {
   Register,
  },
}
</script>
