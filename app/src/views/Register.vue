<template>
  <section class="container">
    <div class="column is-4 is-offset-4" v-if="error">
      <div class="notification is-danger">
        {{ error }}
      </div>
    </div>
    <div class="column is-4 is-offset-4">
      <h1 class="title">Register</h1>
      <form class="box" novalidate @submit.prevent="register">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input type="text" class="input" placeholder="Name" v-model="user.name" />
          </div>
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input type="email" class="input" placeholder="Email" v-model="user.email"/>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input type="password" class="input" placeholder="Password" v-model="user.password"/>
          </div>
        </div>
        <div class="field">
          <p>User type:</p>
          <div class="control">
            <label class="radion mr-3" for="patient">
              <input type="radio" id="patient" value="patient" v-model="user.type">
              Patient
            </label>
            <label class="radion" for="dentist">
              <input type="radio" id="dentist" value="dentist" v-model="user.type">
              Dentist
            </label>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button">Register as {{user.type.toLowerCase()}}</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Register',
  data() {
    return {
      error: '',
      user: {
        name: '',
        email: '',
        password: '',
        type: 'patient',
      },
    };
  },
  methods: {
    register() {
      axios({
        method: 'POST',
        headers: { 'Content-Type': 'multipart/form-data' },
        url: '/api/v1/users',
        data: { user: this.user },
      })
        .then((response) => {
          // eslint-disable-next-line
          console.log(response.data);
          this.$router.push({ path: '/login' });
        })
        .catch((error) => {
          // eslint-disable-next-line
          console.error(error);
          if (error.response) {
          // eslint-disable-next-line
            console.log(error.response.data);
            this.error = error.response.data.message;
          }
        });
    },
  },
};
</script>

<style scoped>
</style>
