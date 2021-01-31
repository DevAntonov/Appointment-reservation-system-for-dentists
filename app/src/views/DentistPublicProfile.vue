<template>
  <div>
    <h1>Dentist profile</h1>
  </div>
</template>

<script>
import axios from 'axios';

function fetchDentist(dentistId) {
  return axios.get(`/api/v1/dentists/${dentistId}`);
}

export default {
  data() {
    return {
      dentistId: this.$route.params.dentistId,
      dentist: null,
    };
  },
  mounted() {
    console.log('mounted');
    console.log(this.dentistId);
    fetchDentist(this.dentistId)
      .then((response) => {
        console.log(response.data);
      }, (error) => {
        console.log(error);
        if (error.response) {
          console.log(error.response.data);
        }
      });
  },
};
</script>
<style scoped>
</style>
