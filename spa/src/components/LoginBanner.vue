<template>
  <div class="hello card">
    <div class="card ">
      <div class="card-body">
        {{ message }}
        
        <button @click="logout" v-if="isLogged"  class="btn btn-warning btn-sm m-1">Logout</button>
      </div>

    </div>
  </div>
</template>

<script>

import LoginApi from "@/utils/LoginApi"
import { EventBus } from '../event-bus.js'

export default {
  name: 'HelloWorld',
  data(){
    return {
      message: "Nie zalogowany",
      isLogged: false
    }
  },
  mounted(){
    EventBus.$on('refresh-panel', this.refreshPanel)
    this.refreshPanel()
  },
  methods: {
    logout(){
        sessionStorage.setItem('api_login_token','')
        this.message = "Nie zalogowany"
        this.isLogged = false
    },
    refreshPanel(){
      var login = new LoginApi()
      var token = sessionStorage.getItem('api_login_token')
      var payload = login.getTokenPayload(token)

      if (payload.username && login.isTokenExpired(token) === false) {
          this.message = "Witaj " + payload.username
          this.isLogged = true
      } else {
          this.message = "Nie zalogowany"
          this.isLogged = false
      }
    }
  }

}
</script>

