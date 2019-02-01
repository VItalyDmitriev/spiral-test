<template>
  <div id="app">
    <nickname-component></nickname-component>
  </div>
</template>

<script>
  import Nickname from './components/nickname.vue';
export default {
  name: 'app',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
    components: {
      'nickname-component': Nickname
    }
}
</script>