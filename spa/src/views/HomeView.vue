<template>
  <div class="home">
    <h3>HOME</h3>
    <img alt="Vue logo" src="../assets/logo.png">
    <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
    <br>
    <div class="aler alert-info" v-if="message">{{ message }}</div>
    <br>
    <button class="btn btn-primary m-1" @click="fetchData">Pobierz dane z default</button>
    <br>
    <table class="table">
      <tr v-for="item in items" v-bind:key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.price }}</td>
      </tr>
    </table>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import LoginApi from "@/utils/LoginApi"
// import Session from "@/utils/Session"
// import axios from "axios"

export default {
  name: 'HomeView',
  components: {
    // HelloWorld
  },
  data() {
    return {
      message: "",
      items: [],
    }
  },
  methods: {
   async fetchData(){

      // var response = await axios.get('/api-login/', { });
      // // var response = await axios.get('/api-login/', { });
      // console.log(response)

      var login = new LoginApi()
      var response = await login.get('/api-login/api/default')
      if (response === false) {
        this.message = "Nie udalo sie pobrac danych. Sprawdz token"
      } else {
        this.message = response.message
        this.items = response.data
      }
  
    },
  }
}
</script>
