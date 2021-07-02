<template>
  <div>
    <div class="main-wrap-calc">
      <div class="calculatorWrapForm popap-form main-page shell-form">
        <div class="leftSection">
          <div class="title"> {{ messages[lang].making_request }} </div>
          <div class="toggle-blocks">
            <form action="#" class="calc-form">
              <div class="wrap-select-option">
    
                  <div class="flex_wrapper">
                    <div class="wrap-input-form mob_mb_20"> 
                      <div class="col-input">
						            <div class="section-input">
						            	<span class="sup-title">{{ messages[lang].full_name_user }}</span>
						            	<input class="isCheck"
						            				v-model.trim="formData.user" 
						            				type="text" 
						            				autocomplete="off"
						            				:placeholder="messages[lang].full_name_user_placeholder"
						            	>
						            </div>
                        <div class="section-input">
                          <span class="sup-title"> {{ messages[lang].departments}} </span>
                          <span class="icon-arrow-down-gray"></span>
                          <select name="department" 
                                  id="department" 
                                  class="isCheck"
                                  v-model="formData.department" 
                                  >
                            <option disabled value="0">{{ messages[lang].select__branch }}</option>
                            <option v-for="city in citiesList"
                              :key="`city-${city.id}`"
                              :value="city.id"
                            >{{city[`title_${lang}`]}}</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-input">
                      	<div class="section-input">
                          <span class="sup-title">{{ messages[lang].phone }}</span>
                          <input class="isCheck"
                                v-model.trim="formData.phone" 
                                type="number" 
                                autocomplete="off"
                                :placeholder="messages[lang].phone_placholder"
                          >
                        </div>
                        <div class="section-input">
                          <input class="isCheck"
                                autocomplete="off"
                                id="getFile"
                                type="file" 
                                @change="handleChange($event.target.files)"
                                > 
                          <label class="getFile" for="getFile">
                            <span class="get_file_title" v-if="visibleSelected">{{ messages[lang].device_photo }}</span>
                            <span class="get_file_title" v-else>{{ selectedImage }}</span>
                            <span class="icon-get-photo"></span>
                          </label>
                        </div>

                      </div>
                    </div>
                    <div class="check-box">
                      <input id="check_agreement" type="checkbox">
                      <label for="check_agreement" class="checkbox-label"></label>
                      <span>{{ messages[lang].check_agreement}}</span>
                    </div>
                  </div>
              </div>
              <button type="submit" 
                      :disabled="isDisabledScrap"
                      :class="[{ disabled: isDisabledScrap }, 'button']">
                      {{ messages[lang].send }}
              </button>
            </form>
          </div>

        </div>

        <div class="result-blocks">
          <div class="result-body-list"></div>
        </div>

        <div class="close-btn" @click="hidePopap()" >
          <span class="icon-questions-plus"></span>
        </div>

      </div>
    </div>
  </div>
</template>


<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import { validateForm } from '../../mixins/validateForm';

export default {
 mixins: [ lang ],

  data() {
    return {
      visible: false,
      btnSwitchTrue: true,
      btnSwitchFalse: false,
      visibleSelected: true,
      selectedImage:  '',
      formData: {
        department: 0,
        user: "",
        phone: "" 
      },
      required: ['department','phone', 'user']
    };
  },

  props: ['categoryId'],

  methods: {
    getUnits: function() {

    },

    switcherValues(btnName) {
      this.btnSwitchTrue = false;
      this.btnSwitchFalse = false;

      this[btnName] = true;
    },

    handleCalc() {
      console.log("submit");
    },

    hidePopap() {
      this.$emit('isVisibleHidden', false)
    },

   handleChange(files) {
			
			this.visibleSelected = false;
			this.selectedImage = files[0].name;
    },

  },

  beforeMount(){
    //  this.getUnits()
  },

  computed: {
    isDisabledScrap() {
      return validateForm(this.required, this.formData);
    },

    citiesList: () => ([
      {id:1, title_ru: 'Запорожье', title_ua: 'Запорiжжя' },
      {id:2, title_ru: 'Днепр', title_ua: 'Днепр' },
      {id:3, title_ru: 'Киев', title_ua: 'Киев' },
    ]),

    messages: () => messages,
  },

  created() {
    
  },

   mounted() {
    this.setLang();

  },
}
</script>