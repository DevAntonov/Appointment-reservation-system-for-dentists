<template>
  <div class="register-form">
    <h1>Register</h1>
    <p v-if="error" class="error">{{ error }}</p>
    <form novalidate @submit.prevent="register">
      <div>
        <input type="text" placeholder="Name" v-model="user.name" />
      </div>
      <div>
        <input type="email" placeholder="Email" v-model="user.email"/>
      </div>
      <div>
        <input type="password" placeholder="Password" v-model="user.password"/>
      </div>
      <div>
        <p>User type:</p>
        <input type="radio" id="patient" value="patient" v-model="user.type">
        <label for="patient">Patient</label>
        <input type="radio" id="dentist" value="dentist" v-model="user.type">
        <label for="dentist">Dentist</label>
      </div>
      <button type="submit">Register as {{user.type.toLowerCase()}}</button>
    </form>
  </div>
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
            this.error = error.response.data.errormsg;
          }
        });
    },
  },
};
</script>

<style scoped>
.register-form {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  height: 100vh;
}

.register-form div {
  margin: 20px 0px;
}

.register-form button {
  width: 100%;
}

.register-form p.error {
  color: red;
  font-size: 36px;
}
</style>
