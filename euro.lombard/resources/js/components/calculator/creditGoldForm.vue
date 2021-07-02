<template>
  <div>
    <form action="#" class="calc-form" @submit.prevent="handleCalc">
      <div class="wrap-select-option">
        <div class="check-box">
          <input id="check" type="checkbox"  v-model="visible" >
          <label for="check" class="checkbox-label"></label>
          <span>{{ messages[lang].scrap_check}}</span>
        </div>

        <creditWrapInputs @reset-form="doSomething" v-if="!visible"></creditWrapInputs>
        <creditWrapScrapInputs  v-if="visible"></creditWrapScrapInputs>

      </div>
    </form>
  </div>
</template>


<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';

export default {
  mixins: [ lang ],

  components: {
    creditWrapInputs: () => import(/* webpackChunkName: "creditWrapInputs" */ './creditWrapInputs.vue'),
    creditWrapScrapInputs: () => import(/* webpackChunkName: "creditWrapScrapInputs" */ './creditWrapScrapInputs.vue'),
  },
  
  data() {
    return {
      visible: false,
    };
  },

  props: ['categoryId'],

  methods: {
    getUnits: function() {

    },
    doSomething(value) {
      console.log(value);
    },
  },

  beforeMount(){
     this.getUnits()
  },

  computed: {
    messages: () => messages,
  },

   mounted() {
    this.setLang();
  },
}
</script>