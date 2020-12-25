<template>
  <div class="home">
    <HomeNavbar />
  </div>
</template>

<script>
// @ is an alias to /src
import HomeNavbar from '@/components/HomeNavbar.vue';

export default {
  name: 'Home',
  components: {
    HomeNavbar,
  },
};
</script>
