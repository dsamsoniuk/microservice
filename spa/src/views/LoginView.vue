<template>
  <div class="login ">
    <div class="text-left">
        <h3>Panel logowania - api symfony</h3>
    </div>

    <hr>
    <div class="alert alert-info" v-if="message">
      {{ message }}
    </div>
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
      </div>
      <div class="col-sm-12 col-md-4"></div>

    </div>
</div>
</template>

<script>
import LoginApi from "@/utils/LoginApi"
import { EventBus } from '../event-bus.js'

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
  methods: {

    async submitForm() {
      var form = this.form

      if (form.username && form.password) {
          var login = new LoginApi()
          var isRefreshed = await login.refreshToken(form.username, form.password)
          if (isRefreshed) {
            this.message = `Zalogowano jako ${form.username}`;
            EventBus.$emit('refresh-panel')
            // this.$router.push('/')
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
