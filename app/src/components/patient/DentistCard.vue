<template>
  <div>
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">{{ dentist.name }}</p>
      </header>
      <div class="card-content">
        <div class="content">
          <h4>Rating: {{ dentist.rating }}</h4>
          <h4>Email: {{ dentist.email }}</h4>
          <h4>Description: {{ dentist.description }}</h4>
        </div>
      </div>
      <div class="card-footer">
        <router-link
        class="card-footer-item"
        :to="{name: 'dentist-profile', params: {dentistId: dentist.id}}"
        >
          View profile
        </router-link>
      </div>
    </div>
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
