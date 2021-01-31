<template>
  <div class="container">
    <div class="row" v-if="error">Error: {{error}}</div>
    <div class="row">
      <section id="wrap_form">
        <div class="form_box">
          <h1>Login</h1>
          <div class="user-type-wrapper">
            <div
            class="user-type"
            :class="{'active': user.type === 'patient'}"
            @click="selectUserType('patient')"
            >
            Patient
            </div>
            <div
            class="user-type"
            :class="{'active': user.type === 'dentist'}"
            @click="selectUserType('dentist')"
            >
            Dentist
            </div>
          </div>
          <form id="dentist_form" class="input_credentials" @submit-prevent="login">
            <input
              type="text"
              class="input_field"
              placeholder="Email"
              v-model="user.email"
              required
            />
            <input
              type="password"
              class="input_field"
              placeholder="Password"
              v-model="user.password"
              required
            />
            <button type="submit" class="btn_submit" @click="login">
              Log In
            </button>
          </form>
          <p class="p_style">
            Don't have an account? <router-link to="/register">Register</router-link>
          </p>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
/* eslint-disable  no-unreachable */
export default {
  data() {
    return {
      error: '',
      user: {
        type: 'patient',
        email: '',
        password: '',
      },
    };
  },
  methods: {
    selectUserType(type) {
      this.user.type = type;
    },
    login() {
      // eslint-disable-next-line
      axios({
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        url: '/api/v1/users/authenticate',
        data: { user: this.user },
      })
        .then((response) => {
          // eslint-disable-next-line
          console.log(response.data);
          const { token } = response.data;
          document.cookie = `_token=${token}`;
          this.$router.push({ path: '/patient/dashboard' });
        }, (error) => {
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
.user-type-wrapper {
  display: flex;
  margin: 9px auto;
  border: 2px solid #3b9fe2;
  max-width: 200px;
  padding: 0px;
}

.user-type {
  width: 50%;
  margin: 0;
  padding: 10px;
  text-align: center;
  cursor: pointer;
  background-color: #fff;
  transition: 0.3s;
}

.user-type:hover {
  background-color: #65b3e7;
  color: #fff;
}

.user-type.active {
  background-color: #65b3e7;
}

.container {
  width: 100%;
  display: flex;
  flex-direction: column;
}

#wrap_form {
  width: 100%;
  height: 100%;
}

.form_box {
  width: 380px;
  height: 480px;
  position: relative;
  margin: 10% auto;
  padding: 5px;
  background: #fff;
  overflow: hidden;
  border-top: 6px solid #3b9fe2;
  border-radius: 3px;
  box-shadow: 1px 1px 6px 1px rgba(0, 0, 0, 0.3);
}

.form_box h1 {
  text-align: center;
  padding-top: 15px;
  color: #4d4d4d;
  font-size: 24px;
  text-transform: uppercase;
}

.p_style {
  position: absolute;
  text-align: center;
  bottom: 30px;
  left: 60px;
  color: #4d4d4d;
}

.btn_box {
  position: relative;
  width: 220px;
  margin: 35px auto;
  box-shadow: 0px 1px 4px 1px rgba(0, 0, 0, 0.15);
  border-radius: 9px;
  color: #fff;
}

.toggle_forms {
  position: relative;
  padding: 10px 30px;
  cursor: pointer;
  background: transparent;
  border: 0;
  outline: none;
  color: #fff;
}

#btn_tgl {
  top: 0;
  left: 0;
  position: absolute;
  width: 100px;
  height: 100%;
  background-color: #3b9fe2;
  border-radius: 9px;
  transition: 0.5s;
  color: #fff;
}

#btn_change_color_patient {
  color: black;
}

.input_credentials {
  position: absolute;
  width: 280px;
  top: 180px;
  transition: 0.5s;
}

.input_field {
  width: 100%;
  padding: 10px 0;
  margin: 5px 0;
  border-left: 0;
  border-top: 0;
  border-right: 0;
  border-bottom: 1px solid #999;
  outline: none;
  background: transparent;
}

.btn_submit {
  position: absolute;
  width: 85%;
  top: 240px;
  left: 10%;
  padding: 10px 15px;
  cursor: pointer;
  display: block;
  margin: auto;
  background-color: #3b9fe2;
  border: 0;
  outline: none;
  border-radius: 15px;
  color: #fff;
  font-size: 22px;
  box-shadow: 0px 2px 8px -1px rgba(0, 0, 0, 0.3);
}
.btn_submit:hover {
  background-color: #4397cf;
  transition: 0.3s;
}

.check_box {
  margin: 30px 10px 30px 0;
  margin-bottom: 3em;
}
span {
  position: absolute;
  color: #777;
  font-size: 12px;
  bottom: 66px;
}

#dentist_form {
  top: 150px;
  left: 50px;
}
#patient_form {
  top: 150px;
  left: 450px;
}

a {
  text-decoration: none;
}
</style>
