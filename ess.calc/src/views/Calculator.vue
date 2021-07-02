<template>
<div class="mainWrapper">
  <div class="contentWrapper">
    <Header />

    <div class="calc-page__wrap-container">
      <Banner />
      <div class="header-print">
        <div class="header-print-logo"> <img src="@/assets/img/ESS-logo-new.png" alt=""></div>
        <div class="header-print-adress">
          <p> <span>Адрес:</span></p>
          <p>ул. Волгоградская, 4 (р-н 95 квартала.)</p>       
        </div>
        <div class="header-print-phone flex">
          <img src="@/assets/img/phone-call.svg" alt="">
          <a href="#">068 153 73 03</a>
        </div>
      </div>
      <div class='calc-form-block mcontainer'>

        <div class="form-title">Калькулятор солнечной электростанции
          <span class="noprint" >Калькулятор</span>
        </div>
        <div class="form-suptitle">Выберите конфигурацию СЭС:</div>
        
        <div v-if="!this.$store.state.add_data_loaded" class="spinner-wrap">
          <div class="text-center">
            <b-spinner style="width: 3rem; height: 3rem;" label="Spinning"></b-spinner>
          </div>
        </div>
        
        <transition v-if="this.$store.state.add_data_loaded" name='fadeUp'>
          <form class="miscount-form">
            <SolarStantionProperties v-if='this.$store.state.settings'/>
          </form>
        </transition>

        <transition v-if="this.$store.state.add_data_loaded" name='fadeUp'>
          <div class="table-wrap">
            <PriceDetail v-if='all_selected'/>
            <button class="clear-btn" @click="clearFields">Очистить</button>
          </div>
        </transition>
        <Footer/>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'

import SolarStantionProperties from '@/components/calculator/SolarStantionProperties.vue'
import PriceDetail from '@/components/calculator/PriceDetail.vue'
import Banner from '@/components/Banner.vue'

export default {
  name: 'Home',
  components: {
    SolarStantionProperties,
    PriceDetail,
    Header,
    Footer,
    Banner,
  },
  computed : {
    all_selected(){
      return this.$store.state.selected_inventor && this.$store.state.selected_panel && this.$store.state.selected_construction
    }
  },
  methods:{
    clearFields() {
      this.$store.dispatch('reset_selection');
    },
  },
  mounted(){
    this.$store.dispatch('reset_selection')
    if (!this.$store.state.add_data_loaded){
      this.$store.dispatch('get_data')
    }
  }
}
</script>


<style scoped>


@media print{
   .noprint{
       display:none;
   }
}

</style>