<template>
  <div id="app" class="container mt-3">
    <div class="row">
      <div class="col-sm-4">
        <ul class="list-group">
          <li class="list-group-item active" aria-current="true">Menu</li>
          <li class="list-group-item"><router-link to="/about">About</router-link></li>
          <li class="list-group-item active" aria-current="true">API_LOGIN</li>
          <li class="list-group-item"><router-link to="/login">Panel logowania</router-link></li>
           <li class="list-group-item"><router-link to="/">Pobierz proste dane</router-link></li>
          <li class="list-group-item active" aria-current="true">API_PRODUCT</li>
          <li class="list-group-item"><router-link to="/product-list">Lista produktow</router-link></li>

          <li class="list-group-item active" aria-current="true">API_ORDER</li>

        </ul>

      </div>
      <div class="col-sm-8">
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
</style>
