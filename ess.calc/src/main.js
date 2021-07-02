import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import BootstrapVue from 'bootstrap-vue'
import * as prop from './AppProperties.vue'
import VueAnalytics from 'vue-analytics'
import vueNumeralFilterInstaller from 'vue-numeral-filter';

Vue.use(vueNumeralFilterInstaller, { locale: 'ru-ua' });

Vue.config.productionTip = false

Vue.use(BootstrapVue)
 
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'vue2-animate/dist/vue2-animate.min.css'
import 'vue-search-select/dist/VueSearchSelect.css'
import './assets/styles/main.scss'


Vue.use(VueAnalytics, {
  id: 'UA-131841826-1',
  router,
  autoTracking: {
    screenview: true
  }
})

new Vue({
  prop,
  router,
  store,
  render: h => h(App)
}).$mount('#app')