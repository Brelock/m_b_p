/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./common');
require('./offices');
require('./vacancy');
require('./calculator');


require('chosen-js');
require('jquery-timepicker/jquery.timepicker');
require('bootstrap-datepicker');
require('./actions');
require('./clients');


window.Vue = require('vue');
/**
 + * Next, we will create a fresh Vue application instance and attach it to
 + * the page. Then, you may begin adding components to this application
 + * or customize the JavaScript scaffolding to fit your unique needs.
 + */
import imagecomponent from './components/ImageComponent.vue'
import certificatecomponent from './components/CertificateComponent.vue'
import statuses from './components/Statuses.vue'
import watches from './components/Watches.vue'
import calculatorprice from './components/CalculatorPrice.vue'
import calculatorrates from './components/CalculatorRates.vue'
import calculatortariff from './components/CalculatorTariff.vue'
import flash from './components/Flash.vue'
Vue.component('image-component', imagecomponent);
Vue.component('certificate-component', certificatecomponent);
Vue.component('statuses', statuses);
Vue.component('watches', watches);
// Vue.component('status', require('./components/Status.vue'));
Vue.component('calculator-price', calculatorprice);
Vue.component('calculator-rates', calculatorrates);
Vue.component('calculator-tariff', calculatortariff);
Vue.component('flash', flash);

const app = new Vue({
    el: '#main'
});
