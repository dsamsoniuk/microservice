<template>
  <div class="login">

   <p> User: {{ username }}</p>
   <p> message: {{ message }}</p>
  <hr>
  <h3>Panel logowania</h3>
    <div class="row">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4">
          <form @submit.prevent="submitForm">
            <div>
              <label for="username">Username:</label>
              <input type="text" v-model="form.username" id="username" class="form-control"/>
            </div>
            <div>
              <label for="password">Password:</label>
              <input type="password" v-model="form.password" id="password" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary m-1">Zaloguj się</button>
          </form>
          <button @click="logout" v-if="username != ''" class="btn btn-warning m-1">Logout</button>
      </div>
      <div class="col-sm-12 col-md-4"></div>

    </div>



</div>
</template>

<script>
import LoginApi from "@/utils/LoginApi"

export default {
  name: 'LoginView',
  data() {
    return {
      username: "",
      message: "",
      items: [],
      form: {
        username: 'damian@poczta.pl',
        password: 'damian'
      },
    }
  },
  mounted(){
    var login = new LoginApi()
    var token = sessionStorage.getItem('api_login_token')
    var payload = login.getTokenPayload(token)

    if (payload.username && login.isTokenExpired(token) === false) {
        this.username = payload.username
    } else {
        this.username = ''
    }
  },
  methods: {
    logout(){
        sessionStorage.setItem('api_login_token','')
        this.username = ''
    },
    async submitForm() {
      var form = this.form

      if (form.username && form.password) {
          var login = new LoginApi()
          var isRefreshed = await login.refreshToken(form.username, form.password)
          if (isRefreshed) {
            this.message = `Zalogowano jako ${form.username}`;
            this.$router.push('/')
          } else {
              this.message = 'Nie udalo sie zaktualizowac tokena';
          }
      } else {
        this.message = 'Uzupełnij wszystkie pola!';
      }
    },
 


  }
}
</script>
