import Vue from 'vue'
import App from './App.vue'
window.Vue = Vue;
new Vue({
  el: '#app',
  render: h => h(App)
})
