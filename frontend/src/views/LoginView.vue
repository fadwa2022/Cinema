<template>
  <div class="home">
    <Login/>
  </div>
</template>

<script>
// @ is an alias to /src
import Login from '@/components/Login';


export default {
  name: 'LoginView',
  components: {
   Login,
  },
}
</script>
