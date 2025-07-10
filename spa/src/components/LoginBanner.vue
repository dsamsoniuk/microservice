<template>
  <div class="hello card">
    <div class="card-primary">

    <div v-if="isLogged">
      Zalogowany
    </div>
    </div>
  </div>
</template>

<script>

import LoginApi from "@/utils/LoginApi"
// import Session from "@/utils/Session"

export default {
  name: 'HelloWorld',
  data(){
    return {
      isLogged: false
    }
  },
  mounted(){
    var login = new LoginApi()
    var token = sessionStorage.getItem('api_login_token')
    var payload = login.getTokenPayload(token)

    if (payload.username && login.isTokenExpired(token) === false) {
        this.username = payload.username
        this.isLogged = true
    } else {
        this.username = "Nie zalogowany"
        this.isLogged = false
    }
  }

}
</script>

