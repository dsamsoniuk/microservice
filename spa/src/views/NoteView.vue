<template>
  <div class="home text-left">
    <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
    <h3>Notatki</h3>
    <hr>
    <button class="btn btn-primary m-1" @click="fetchData">Pobierz notatki</button>

    <br>
    <div class="aler alert-info m-2 p-2" v-if="message">{{ message }}</div>

    <br>
    <table class="table text-left">
      <tr v-for="item in items" v-bind:key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.content }}</td>
      </tr>
    </table>

  </div>
</template>

<script>

import LoginApi from "@/utils/LoginApi"

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
