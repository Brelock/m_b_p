<template>
  <b-col class='selector-container' :class='{[classes] : 1}'>
    <label class='w-100 text-left label label--opty' :for="id">{{label_text}}</label>
    <select v-if="is_mobile" class="ui fluid search selection dropdown standard-select" 
      :disabled="disabled" v-model='model' :id='id'
    >
      <option :value="{}" selected disabled>{{placeholder}}</option>
      <option v-for="option in options" :key="`option-${option.text}`"
      :value="option">{{ option.text }}</option>
    </select>

    <model-select v-else :isDisabled="disabled" v-on:keyup.enter="hideKeyboard" v-model='model' :options='options' :id='id' :placeholder='placeholder'/>
  </b-col>
</template>

<script>
import { ModelSelect } from 'vue-search-select'
export default {
  name: 'Selector',
  components :{
    ModelSelect
  },
  data(){
    return {
      model : {}
    }
  },
  props: {
    disabled : {type : Boolean, required : false, default : false},
    classes : {type : String, required : false, default : ''},
    selection_data : {type : Array, required : true},
    label_text : {type : String, required : true},
    placeholder : {type: String, required : false, default : 'Please select'},
    id : {type: String, required : true},
    vuex_action_name: {type : String, required : true},
  },
  watch :{
    model(new_val, old_val){
      this.$store.dispatch(this.vuex_action_name, new_val.value)
      if (this.id == 'solar_stantion_power_id' && this.$store.state.selected_inventor){
        this.$store.dispatch('stantion_power_changed')
      }
    },
    selected_inventor(new_val, old_val){
      if (new_val === undefined){
        this.model = {}
      }
    },
    hideKeyboard() {
      document.activeElement.blur();
    }
  },
  computed : {
    is_mobile() {
      return this.$store.state.is_mobile;
    },

    selected_inventor(){
      return this.$store.state.selected_inventor
    },
    options(){
      if (this.id === 'solar_stantion_power_id'){
        return this.selection_data.reduce((obj, item) => {
          obj.push({'value' : item, 'text' : `${item.power / 1000} кВт` })
          return obj
        }, [])
      }
      if (['inventor_id', 'panel_id'].includes(this.id)){
        return this.selection_data.reduce((obj, item) => {
          obj.push({'value' : item, 'text' : `${item.name} - ${item.power}Вт - $${item.price}` })
        return obj
      }, [])
      }
      if (this.id === 'construction_id'){
        return this.selection_data.reduce((obj, item) => {
          obj.push({'value' : item, 'text' : `${item.name}` })
          return obj
        }, [])
      }
    }
  }
}
</script>

<style scoped>
.bg-as-selector{
  color : var(--selector-bg-color)!important;
}
label{
  margin-top: 0.4em!important;
  padding-right: 0.5em!important;
}
.selector-container{
  background-color: transparent;
}

.col{
  padding: 0 !important;
  margin-top: 0.75em!important;
}
</style>