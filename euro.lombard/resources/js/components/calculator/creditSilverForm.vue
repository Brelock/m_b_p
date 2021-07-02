<template>
  <div>
    <form action="#" class="calc-form">
      <div class="wrap-select-option">
        <div class="check-box">
          <input id="check" type="checkbox"  v-model="isScrap" @change="updateRequired">
          <label for="check" class="checkbox-label"></label>
          <span>{{ messages[lang].scrap_check}}</span>
        </div>

        <creditWrapInputs @submitForm="handleSubmitForm" v-if="!isScrap"></creditWrapInputs>
        <creditWrapScrapInputs @submitForm="handleSubmitForm" v-if="isScrap"></creditWrapScrapInputs>

      </div>
    </form>
  </div>
</template>


<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import { validateForm } from '../../mixins/validateForm';
import { api } from '@/api';

export default {
 mixins: [ lang ],

  components: {
    creditWrapInputs: () => import(/* webpackChunkName: "creditWrapInputs" */ './creditWrapInputs.vue'),
    creditWrapScrapInputs: () => import(/* webpackChunkName: "creditWrapScrapInputs" */ './creditWrapScrapInputs.vue'),
  },

  data() {
    return {
      isScrap: false,
      btnSwitchTrue: true,
      btnSwitchFalse: false,
      required: ['department','weight','probe']

    };
  },

  props: ['categoryId'],

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

    switcherValues(btnName) {
      this.btnSwitchTrue = false;
      this.btnSwitchFalse = false;

      this[btnName] = true;
    },

    handleSubmitForm(payload) {

      this.formSaving = true;
      console.log(payload)
      api('POST', payload.url, payload).then(() => {
        this.formSaving = false;
        // show notification
      }).catch((error) => {
        // show notification
      })
    }

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