<template>
  <div>
    <b-row>
        <b-col class='form-row'>
            <label class="label label--opty" for="fio">ФИО</label>
            <transition name='fadeUp'>
                <label v-if='make_order_clocked && !name' class='field-required-lable' for="fio">Обязательное поле</label>
            </transition>
            <input :class='{"highlighted-input" : make_order_clocked && !name}' id='fio' class="form-control" text requited v-model='name'/>
        </b-col>
    </b-row>
    <b-row>
        <b-col class='form-row'>
            <label class="label label--opty" for="phone_id">Телефон</label>
            <transition name='fadeUp'>
                <label v-if='make_order_clocked && !phone_valid' class='field-required-lable' for="fio">Обязательное поле, формат: {{phone_format}}</label>
            </transition>
            <the-mask :class='{"highlighted-input" : make_order_clocked && !phone_valid}'
                    ref='phone_focus' 
                    :masked='true' 
                    v-model='phone' 
                    :mask='phone_format'
                    type="text" 
                    class="form-control" 
                    id="phone_id"/>
        </b-col>
    </b-row>
        <b-row>
            <b-col class='form-row'>
                <label class="label label--opty" for="city">Город</label>
                <transition name='fadeUp'>
                    <label v-if='make_order_clocked && !city' class='field-required-lable' for="fio">Обязательное поле</label>
                </transition>
                <input id='city' :class='{"highlighted-input" : make_order_clocked && !city}' class="form-control" text requited v-model='city'/>
            </b-col>
    </b-row>
    <b-row>
        <b-col>
            <button id='popoverButton-order' class="mx-3 my-3 fotm-btn-booking" @click="proceedRequest">Заказать</button>
            <b-popover ref="pop" target="popoverButton-order" placement='bottom' :disabled='true'>
                Вы не указали параметры СЭС на предыдущем этапе
            </b-popover>
        </b-col>
    </b-row>
  </div>
</template>

<script>
import {TheMask} from 'vue-the-mask'
import axios from 'axios'
import Vue from 'vue'

export default {
  name: 'CartForm',
  data() {
      return {
          phone : '',
          name : '',
          city : '',
          make_order_clocked : false
      }
  },
  components :{
    TheMask,  
  },
  methods:{
      proceedRequest(){
          this.make_order_clocked = true;
          let st = this.$store.state
          let all_selected = st.selected_panel && st.selected_inventor && st.selected_construction && st.selected_stantion
          if (all_selected){
                if (this.phone_valid && this.city && this.name){
                    this.send_order()
                }
            } else{
                this.$refs.pop.$emit('open')
            }
      },
      send_order(){
          var _self = this
          var data = {
              inventor : this.$store.state.selected_inventor,
              panel : this.$store.state.selected_panel,
              panel_count : this.$store.state.panel_count,
              construction : this.$store.state.selected_construction,
              stantion : this.$store.state.selected_stantion,
              client : {
                  name : this.name,
                  phone : this.phone,
                  city : this.city
              }
          }
          axios
            .post(`${Vue.prototype.$apiURL}/order/makeorder/`, data)
            .then(res => {
                console.log(res.data);
                _self.$router.push('/thankyou')
            })
            .catch(error => console.log(error));
      }
  },
  computed:{
    phone_format(){
        return '+380 XX-XX-XX-XXX'
    },
    phone_valid(){
        let re = new RegExp(this.phone_format.replace(/X/g, '\\d').replace(/\-/g, '\\-').replace(/\+/g, '\\+'), 'gi')
        return this.phone ? this.phone.match(re) : false;
    }  
  }
}
</script>

<style scoped>
.row {
    margin-top: 24px;
}
</style>
