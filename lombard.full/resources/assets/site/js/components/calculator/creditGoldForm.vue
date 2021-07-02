<template>
  <div>
    <form action="#" class="calc-form" @submit.prevent="handleCalc">
      <div class="wrap-select-option">
        <div class="check-box">
          <input id="check" type="checkbox" @change="checkedCheckbox"  v-model="isScrap">
          <label for="check" class="checkbox-label"></label>
          <span>{{ messages[lang].scrap_check}}</span>
        </div>

        <creditWrapInputs  v-on:reset-form="updateForm" :key="componentKey"  v-if="!isScrap"></creditWrapInputs>
        <creditWrapScrapInputs v-on:reset-form="updateForm" :key="componentKey" v-if="isScrap"></creditWrapScrapInputs>

      </div>
    </form>
  </div>
</template>


<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import { validateForm } from '../../mixins/validateForm';
import { api } from '../../api';
import creditWrapInputs from './creditWrapInputs.vue'
import creditWrapScrapInputs from './creditWrapScrapInputs.vue'
export default {
  mixins: [ lang ],

  components: {
    creditWrapInputs,
    creditWrapScrapInputs,
  },
  
  data() {
    return {
      componentKey: 0,
      // componentKey2: 0,
      visible: false,
        isScrap: false,
        btnSwitchTrue: true,
        btnSwitchFalse: false,
        categoryId: 1,
     
    };
  },

  methods: {
    getUnits: function() {

    },
    updateRequired() {
        if (this.isScrap) {
            this.required = ['weight','probe'];
        } else {
            this.required = ['department','weight','probe']
        }
    },
    checkedCheckbox() {
      this.updateRequired()
       this.$emit('reset-resulp-block')
       this.$emit('is-scrap')
    },
    updateForm() {
        this.componentKey += 1
        this.$emit('reset-resulp-block')
    },
      switcherValues(btnName) {
          this.btnSwitchTrue = false;
          this.btnSwitchFalse = false;

          this[btnName] = true;
      },
  },

  beforeMount(){
     this.getUnits()
  },

  computed: {
      isDisabled() {
          return validateForm(this.required, this.formData);
      },
    messages: () => messages,
  },

   mounted() {
    this.setLang();
  },
}
</script>