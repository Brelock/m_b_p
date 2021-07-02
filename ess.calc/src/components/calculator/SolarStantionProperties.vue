<template>
  <div class='noprint'>
    <div class="select-item">
      <Selector clases='col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3'
                label_text='Мощность СЭС' id='solar_stantion_power_id' vuex_action_name='selected_stantion'
                :selection_data='this.$store.state.stantions_power'/>
    </div>
    <div class="select-item">
      <Selector :disabled='!this.$store.state.selected_stantion'
                clases='col col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-1'
                label_text='Инвертор' id='inventor_id' vuex_action_name='selected_inventor'
                :selection_data='inventors'/>
    </div>
    <div class="select-item">
      <Selector :disabled='!this.$store.state.selected_inventor'
                clases='col col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-1'
              label_text='Панели' id='panel_id' vuex_action_name='selected_panel'
              :selection_data='panels'/>
    </div>
    <div class="select-item">
      <Selector :disabled='!this.$store.state.selected_panel'
                clases='col col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-1'
              label_text='Конструкция' id='construction_id' vuex_action_name='selected_construction'
              :selection_data='this.$store.state.constructions'/>
    </div>
  </div>
</template>

<script>
import Selector from './Selector.vue'

export default {
  name: 'SolarStantionProperties',
  components :{
    Selector
  },
  computed : {
    selected_stantion(){
      return this.$store.state.selected_stantion
    },
    panels(){
      return this.$store.state.panels
                .sort((p1, p2) => { return p2.power - p1.power})
    },
    inventors(){
      return this.selected_stantion ? 
              this.$store.state.inventors
                .filter(i => i.power >= this.selected_stantion.min_inventor_power && i.power <= this.selected_stantion.max_inventor_power)
                .sort((i1, i2) => {return i2.power - i1.power}) :
              [];
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