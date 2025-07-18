<template>
  <div class="hello">
    <h1>HELLOWORLD</h1>
   <h3>{{ msg }}</h3>
    <p>
      For a guide and recipes on how to configure / customize this project,<br>
      check out the
      <a href="https://cli.vuejs.org" target="_blank" rel="noopener">vue-cli documentation</a>.
    </p>
    <h3>Installed CLI Plugins</h3>
    <ul>
      <li><a href="https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-babel" target="_blank" rel="noopener">babel</a></li>
      <li><a href="https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-eslint" target="_blank" rel="noopener">eslint</a></li>
    </ul>

  </div>
</template>

<script>
import { EventBus } from '../event-bus.js'

export default {
  name: 'HelloWorld',
  data() {
    return {
      msg: "",
    }
  },
  props: {
    message: String
  },
  mounted() {
    EventBus.$on('run-hello-method', this.helloMethod)
  },
   methods: {
    helloMethod() {
      this.msg = "HelloMetoda"
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
