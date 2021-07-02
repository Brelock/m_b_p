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
            <creditGoldForm v-on:reset-resulp-block="resetResultBlock"
                            v-on:is-scrap="ivVisibleCreditValue"  
                             v-if="tabName === 'showGold'"></creditGoldForm>
            <creditSilverForm v-on:reset-resulp-block="resetResultBlock" v-if="tabName === 'showSilver'"></creditSilverForm>
            <creditTechForm v-on:reset-resulp-block="resetResultBlock" 
                            v-on:visible-notification="handlerVisibleNotification"  
                            v-if="tabName === 'showTech'"
            ></creditTechForm>
          </div>
        </div>
        
      </div>

       <!-- <div :class="[{list_active: activeList}, result-blocks]" >  -->
      <div class="result-blocks" >
        <div class="splash-screen" v-if="responseForm && !isResultListTech"></div>
        <div class="result-body-list" v-if="!responseForm">
          <div class="body-result">
            <div class="result-title">{{ messages[lang].result_title }}</div>   
            <div class="body-list_value">
              <div class="value_data">{{formData.giveComputedResult}}</div>
              <div class="value_replace"> ₴</div>
            </div>

            <div class="rate_on_loan" v-show="isScrapValue"> 
              <div class="rate_title">{{ messages[lang].sumCredit }}</div>
              <div class="rate_val">{{ formData.giveShortAwayComputedResult }}₴ </div>
              <div class="rate_val" style="display: none;">{{ formData.giveFullAwayComputedResult }}₴ </div>
            </div>
            <div class="description_result">{{ messages[lang].result_description }}</div>
          </div>
         <button type="submit" @click="isVisiblePopap = true" class="button">{{ messages[lang].send_request }}</button>
        </div>

        <!-- tech result -->
        <div class="result-body-list-tech" v-if="isResultListTech">
            <div class="body-result">
              <div class="result-tech-title">{{ messages[lang].complete }}</div>   

              <div class="tech-name">{{formData.type}}, {{formData.brand}}, {{formData.model}}</div>
              <div class="item">
                <span class="subtitle-item">{{ messages[lang].state }}</span>
                <span class="item-state">{{formData.condition}}</span>
              </div>
              <div class="item">
                <span class="subtitle-item">{{ messages[lang].kit }}</span>
                <span class="item-state">{{formData.kit}}</span>
              </div>
            </div>
        </div>
      </div>

    </div>
  </div>

  <div class="overlay-section" v-if="isVisiblePopap">
    <creditsPopap @isVisibleHidden="handlerVisiblePopap" :responseData="responseData" :formData="formData" :departments="departments" v-on:visible-notification="handlerVisibleNotification"></creditsPopap>
    <div class="overlay" @click="hiddenPopap"></div>
  </div>

  <div :class="[{notification: isVisibleNotification}, 'overlay-section']" v-if="isVisibleNotification">
    <div class="body-notification">
      <div class="title">{{ messages[lang].title_notification}}</div>

       <div class="close-btn" @click="hiddenNotification" >
          <span class="icon-questions-plus"></span>
        </div>
    </div>
    <div class="overlay" @click="hiddenNotification"></div>
  </div>

  <div :class="[{progressEvent: progressBar}, 'overlay-section']"  v-if="progressBar">
      <div class="progress-line">
        <div class="progress"></div>
      </div>
      <div class="overlay"></div>
  </div>

</div>
</template>

<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import creditGoldForm from './creditGoldForm.vue'
import creditSilverForm from './creditSilverForm.vue'
import creditTechForm from './creditTechForm.vue'
import creditsPopap from './creditsPopap.vue'

// import  { progress } from '../../helpers/progressBarInit';
// import { api } from '@/api';

export default {
 mixins: [ lang ],
 components: {
    creditGoldForm,
    creditSilverForm,
    creditTechForm,
    creditsPopap,
  },

  data() {
    return {
        departments:[],
      tabName: 'showGold',
      calcItem: "calc-tab",
      isVisiblePopap: false,
      responseForm: true,
      isResultList: false,
      isResultListTech: false,
      resultActive: false,
      activeList: true,
      progressBar: false,
      isVisibleNotification: false,
      isScrapValue: true,
      responseData: {
        creditValue: 0.50,
        sum: 900,
      },
      formData: {
          department: 0,
          weight: '',
          probe: 0,
          isInserts: false,
          discount: false,
          creditDays: 0,
      }
    };
  },

  props: ['activeTab', 'showTabs'],

  methods: {

    ivVisibleCreditValue() {
        this.isScrapValue = !this.isScrapValue;
    },
    hiddenPopap() {
      this.isVisiblePopap = false
    },

    handlerVisiblePopap(data) {
      this.isVisiblePopap = data
    },
    hiddenNotification() {
      this.isVisibleNotification = false
    },
    handlerVisibleNotification() {
      this.resetResultBlock();
      
      setTimeout(() => this.progressBar = true, 500);
      setTimeout(() => {
        this.isVisibleNotification = true;
        this.progressBar = false;
      }, 2000);
      setTimeout(() => this.isVisibleNotification = false, 6000);
    },
    resetResultBlock() {
        this.isResultList = false
        this.responseForm = true
        this.isResultListTech = false
        this.$children[0].componentKey += 1;
    },
    // handleGoldCreated(data) {
    //   console.log(data);
    // },
    showOthers(formName) {
        if(formName == 'showTech')
        {
            this.responseForm = true;
        }
        this.resetResultBlock();
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
    // progress: () => progress,
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
