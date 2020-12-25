<template>
  <nav class="main-nav">
    <a href="">DentBook</a>
    <ul class="nav-links">
      <li><router-link to="/login">Login</router-link></li>
      <li><router-link to="/register">Register</router-link></li>
      <li><router-link to="/about">About</router-link></li>
    </ul>
  </nav>
</template>

<style scoped>
.main-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  background-color: #a3d8f4;
  padding: 24px 32px;
}

.nav-links {
  display: flex;
  width: 25%;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  list-style: none;
}

.nav-links a {
  text-decoration: none;
  color: #7579e7;
  font-weight: bold;
  font-size: 16px;
  font-family: sans-serif;
}
</style>
