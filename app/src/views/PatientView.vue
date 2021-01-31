<template>
  <div>
    Patient view id: {{ patientId }} (fake)
    <router-view></router-view>
    </div>
</template>

<script>
export default {
  data() {
    return {
      patientId: 123,
    };
  },
};
</script>

<style scoped>
</style>
