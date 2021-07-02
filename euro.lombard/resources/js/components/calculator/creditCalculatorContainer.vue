<template>
<div>
  <div class="main-wrap-calc">
    <div class="calculatorWrapForm main-page shell-form">
      <div class="leftSection ">

        <div class="title visible-viewportchecker visibility--check"> {{ messages[lang].title_form }} </div>

        <div class="toggle-blocks">
          <div class="panel-tabs" v-if="showTabs">
            <div @click="showOthers('showGold')"  :class="[{ active: tabName === 'showGold' }, calcItem]"> {{ messages[lang].tab_gold }} </div>
            <div @click="showOthers('showSilver')" :class="[{ active: tabName === 'showSilver' }, calcItem]">{{ messages[lang].tab_silver }}</div>
            <div @click="showOthers('showTech')" :class="[{ active: tabName === 'showTech' }, calcItem]">{{ messages[lang].tab_tech }}</div>
          </div>

          <div class="wrap-form">
            <creditGoldForm v-if="tabName === 'showGold'"></creditGoldForm>
            <creditSilverForm v-if="tabName === 'showSilver'"></creditSilverForm>
            <creditTechForm v-if="tabName === 'showTech'"
            ></creditTechForm>
          </div>
        </div>
        
      </div>

      <div class="result-blocks">
        <div class="splash-screen"></div>
        <div class="result-body-list"></div>
        <button type="submit" class="button">{{ messages[lang].send_request }}</button>
      </div>

    </div>
  </div>

  <div class="overlay-section" v-if="!isVisiblePopap">
    <creditsPopap @isVisibleHidden="handlerVisiblePopap"></creditsPopap>
    <div class="overlay" @click="hiddenPopap"></div>
  </div>

</div>
</template>

<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
// import { api } from '@/api';

export default {
 mixins: [ lang ],
 components: {
    creditGoldForm: () => import(/* webpackChunkName: "creditGoldForm" */ './creditGoldForm.vue'),
    creditSilverForm: () => import(/* webpackChunkName: "creditSilverForm" */ './creditSilverForm.vue'),
    creditTechForm: () => import(/* webpackChunkName: "creditTechForm" */ './creditTechForm.vue'),
    creditsPopap: () => import(/* webpackChunkName: "creditsPopap" */ './creditsPopap.vue'),
  },

  data() {
    return {
      tabName: 'showGold',
      calcItem: "calc-tab",
      isVisiblePopap: true,
    };
  },

  props: ['activeTab', 'showTabs'],

  methods: {

    hiddenPopap() {
      this.isVisiblePopap = false
    },

    handlerVisiblePopap(data) {
      this.isVisiblePopap = data
    },

    // handleGoldCreated(data) {
    //   console.log(data);
    // },
    showOthers(formName) {
      this.tabName = formName;
    },

    /*handleSubmitForm(payload) {
      let url = '/';
      switch (payload.type) {
        case 'gold': url += 'gold'; break;
        case 'silver': url += 'silver'; break;
        case 'tech': url += 'technic'; break;
        default: '';
      }

      this.formSaving = true;
      // console.log(payload)
      api('POST', url, payload).then(() => {
        this.formSaving = false;
        // show notification
      }).catch((error) => {
        // show notification
      })
    }*/

  },

  computed: {
    messages: () => messages,
  },

  watch: {

  },

  created() {
    // console.log(api)
    // this.setIsShouldCollapse();
  },

  mounted() {
   this.tabName = this.activeTab || 'showGold';

    this.setLang(); 
  },
}
</script>
