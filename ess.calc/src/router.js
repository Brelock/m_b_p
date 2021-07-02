import Vue from 'vue'
import Router from 'vue-router'
import Calculator from './views/Calculator.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Calculator
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('./views/Cart.vue')
    },
    {
      path: '/thankyou',
      name: 'thankyou',
      component: () => import('./views/ThankYou.vue')
    },
  ]
})
