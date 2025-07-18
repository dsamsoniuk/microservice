import Vue from 'vue'
import App from './App.vue'
import router from './router'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueCookies from 'vue-cookies'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export const EventBus = new Vue()

Vue.config.productionTip = false
Vue.use(VueCookies, { expires: '7d'})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
