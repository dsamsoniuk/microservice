<template>
  <div class="home">
    <h3>PRODUCT API</h3>
    <br>
    <div class="aler alert-info" v-if="message">{{ message }}</div>
    <br>
    <button class="btn btn-primary m-1" @click="fetchData">Pobierz dane z default</button>
    <br>
    <table class="table">
      <tr v-for="item in items" v-bind:key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
      </tr>
    </table>


  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import LoginApi from "@/utils/LoginApi"
// import Session from "@/utils/Session"

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
      var response = await login.get('/api-product/api/static-products/')
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
