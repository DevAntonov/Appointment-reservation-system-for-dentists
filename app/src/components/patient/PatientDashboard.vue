<template>
  <div>
    Dashboard
    <div>{{error}}</div>
    <div class="dentist-cards-wrapper">
      <dentist-card v-for="dentist in dentists" v-bind:key="dentist.id" v-bind:dentist="dentist" />
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import DentistCard from './DentistCard.vue';

function fetchDentists() {
  return axios.get('/api/v1/dentists');
}

export default {
  data() {
    return {
      error: '',
      dentists: [],
    };
  },
  components: {
    DentistCard,
  },
  mounted() {
    fetchDentists()
      .then((response) => {
        console.log(response.data);
        this.dentists = response.data.dentists;
      }, (error) => {
        if (error.response) {
          this.error = error.response.data.message;
        }
      });
  },
};
</script>

<style scoped>
</style>
