import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './assets/scss/main.scss'
import './axios'
import axios from "axios"


Vue.prototype.$axios = axios



// if(localStorage.getItem('user')){
//     console.log(1)
//   Vue.prototype.$loginUser=JSON.parse(localStorage.getItem('user'));
// }else {
//     console.log(2)
//   Vue.prototype.$loginUser = {};
// }

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
