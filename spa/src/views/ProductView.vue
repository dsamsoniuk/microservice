<template>
  <div class="home text-left">
    <h3>Lista produktów - api django</h3>
    <hr>
    <div class="aler alert-info" v-if="message">{{ message }}</div>
    <br>
    <button class="btn btn-primary m-1" @click="fetchData">Pobierz produkty</button>
    <br>
    <table class="table m-3 w-100">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" v-bind:key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
        </tr>
      </tbody>
    </table>

  </div>
</template>

<script>

import LoginApi from "@/utils/LoginApi"

export default {
  name: 'HomeView',
  data() {
    return {
      message: "",
      items: [],
    }
  },
  methods: {
   async fetchData(){
      var login = new LoginApi()
      var response = await login.get('/api-product/static-products/')
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
