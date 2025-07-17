<template>
  <div id="app" class="container mt-3">

    <div class="row">
      <div class="col-sm-4">

        <div class="row">
          <div class="col-sm-12 p-3">
              <h3>Microservice@2025</h3><hr>
          </div>
        </div>

        <ul class="list-group">
          <li class="list-group-item active bg-secondary" aria-current="true">Menu</li>
          <li class="list-group-item"><router-link to="/about">About</router-link></li>
          <li class="list-group-item active bg-success" aria-current="true">ACCESS (Api Symfony)</li>
          <li class="list-group-item"><router-link to="/login">Login</router-link></li>
          <li class="list-group-item"><router-link to="/">Notes</router-link></li>
          <li class="list-group-item active " aria-current="true">PRODUCTS (Api Django)</li>
          <li class="list-group-item"><router-link to="/product-list">Product list</router-link></li>
        </ul>

        <div class="row">
          <div class="col-sm-12 p-3">
              Powered by  <img class="logo" alt="Vue logo" src="./assets/logo.png">
          </div>
        </div>

      </div>
      <div class="col-sm-8 pt-4">
          <router-view/>
      </div>
    </div>

        <!-- <LoginBanner /> -->

  </div>
</template>
<script>
// import LoginBanner from './components/LoginBanner.vue';

export default {
  components: {
    // LoginBanner
  },
}

</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
.logo {
  width: 30px;
}
</style>
