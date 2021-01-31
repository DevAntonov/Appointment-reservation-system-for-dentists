<template>
  <div>
    <h4>{{ dentist.name }}</h4>
    <h4>Email: {{ dentist.email }}</h4>
    <h4>Description: {{ dentist.description }}</h4>
    <h4>Rating: {{ dentist.rating }}</h4>
    <router-link :to="{name: 'dentist-profile', params: {dentistId: dentist.id}}">
      View profile
    </router-link>
    <hr>
  </div>
</template>

<script>
export default {
  name: 'dentist-card',
  props: ['dentist'],
  data() {
    return {};
  },
};
</script>

<style scoped>
</style>
