<template>
  <div>
    <div class="main-wrap-calc">
      <div class="calculatorWrapForm popap-form main-page shell-form">
        <div class="leftSection">
          <div class="title popap-title"> {{ messages[lang].making_request }} </div>
          <div class="toggle-blocks">
            <form action="#" class="calc-form">
              <div class="wrap-select-option">
    
                  <div class="flex_wrapper">
                    <div class="wrap-input-form mob_mb_20"> 
                      <div class="col-input">
						            <div class="section-input">
						            	<span class="sup-title">{{ messages[lang].full_name_user }}</span>
						            	<input class="isCheck"
						            				v-model.trim="formDataSend.name"
						            				type="text" 
						            				autocomplete="off"
						            				:placeholder="messages[lang].full_name_user_placeholder"
						            	>
						            </div>
                        <div class="section-input" @click="handlerSelect('dropdownyDepartment')">
                          <span class="sup-title"> {{ messages[lang].departments}} </span>
                          <span :class="[{active: dropdownyDepartment}, 'icon-arrow-down-gray']"></span>
                          <div class="customSelect" v-if="!tabletView" >

                            <a class="chosen-single">
                              <input hidden type="text"
                                     v-model="formData.department"
                              >
                              <span v-show="!isEmptyDepartment" class="placeholder">{{ messages[lang].select__branch }}</span>
                              <span else class="placeholder">{{ departmentName }}</span>
                            </a>

                            <ul class="dropdownSelect" v-show="dropdownyDepartment">
                              <li class="option" v-for="department in departments"
                                  @click="getOptionInSelect($event, 'department', 'departmentName', 'isEptyDepartment', 'dropdownyDepartment')"
                                  :key="`city-${department.related_office.id}`"
                                  :data-name='`${messages[lang].departments} №${department.related_office.id}`'
                                  :value="department.related_office.id"
                                  :selected="formData.department == department.related_office.id"
                              >№ {{ department.related_office.id }} {{department.related_office['city_location']}}, {{department.related_office[`address_${lang}`]}}</li>
                            </ul>

                          </div>
                          <select v-if="tabletView"
                                  name="department"
                                  id="department"
                                  class="isCheck"
                                  v-model="formData.department"
                          >
                            <option disabled value="0">{{ messages[lang].select__branch }}</option>
                            <option v-for="department in departments"
                                    :key="`city-${department.related_office.id}`"
                                    :value="department.related_office.id"
                                    :selected="formData.department == department.related_office.id"
                            >№ {{ department.related_office.id }} {{department.related_office['city_location']}}, {{department.related_office[`address_${lang}`]}}</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-input">
                      	<div class="section-input">
                          <span class="sup-title">{{ messages[lang].phone }}</span>
                          <input class="isCheck"
                                v-model.trim="formDataSend.phone"
                                type="number" 
                                autocomplete="off"
                                :placeholder="messages[lang].phone_placholder"
                          >
                        </div>
                        <div class="section-input">
                          <input class="isCheck"
                                autocomplete="off"
                                id="getFile"
                                 ref="file"
                                type="file"
                                @change="handleChange()"
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
                      <input id="check_agreement" type="checkbox" v-model="check_agreement">
                      <label for="check_agreement" class="checkbox-label"></label>
                      <span>{{ messages[lang].check_agreement}}</span>
                    </div>
                  </div>
              </div>
              <button type="button"
                      @click="handleSend"
                      :disabled="isDisabledScrap || !check_agreement"
                      :class="[{ disabled: isDisabledScrap || !check_agreement }, 'button']">
                      {{ messages[lang].send }}
              </button>
            </form>
          </div>

        </div>

        <div class="result-blocks">
          <div class="result-body-list-tech">
            <div class="body-result">
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].product__weight }}</span>
                  <span class="value-item">{{formData.weight}}</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].product__sample }}</span>
                  <span class="value-item">{{formData.prodeName}}</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].stones_and_inserts }}</span>
                  <span class="value-item" v-if="formData.isInserts">{{ messages[lang].true }}</span>
                    <span class="value-item" v-else>{{ messages[lang].false }}</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].placeholder_discount }}</span>
                  <span class="value-item"v-if="formData.discountName">{{formData.discountName}}</span>
                    <span class="value-item" v-else>{{ messages[lang].no_discount }}</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].lending_term }}</span>
                  <span class="value-item" v-if="formData.creditDays">{{formData.creditDays}}</span>
                    <span class="value-item" v-else>{{ messages[lang].scrap_check }}</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].sum }}</span>
                  <span class="value-item">{{formData.giveComputedResult}} грн</span>
                </div>
                <div class="popap-item">
                  <span class="title-item">{{ messages[lang].sumCredit }}</span>
                  <span class="value-item">{{formData.giveShortAwayComputedResult}} грн</span>
                </div>
            </div>
          </div>
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
        check_agreement: false,
      visible: false,
      btnSwitchTrue: true,
      btnSwitchFalse: false,
      visibleSelected: true,
      selectedImage:  '',
        file:'',
      formDataSend: {
          name: "",
          phone: "",
          tariff: 0,
          weight: '',
          category: 0,
          hallmark: 0,
          stone: false,
          client_status: 0,
          term: 1,
          overpayment:0,
          amount:0,
          giveShortAwayComputedResult: 0,
          giveAwayComputedResult: 0,
          giveComputedResult: 0,

      },
        tabletView: false,
        isEmptyDepartment: false,
        departmentName: '',
        dropdownyDepartment: false,
      required: ['department','phone', 'user']
    };
  },

  props: ['categoryId','responseData','formData','departments'],

  methods: {
    getUnits: function() {

    },
      handleView() {
          window.innerWidth <= 992
              ? (this.tabletView = true)
              : (this.tabletView = false);
      },
      setDepartament() {
          let office = this.departments.filter(item => {
              return item.related_office.id == this.formData.department;
          });
          if(office.length)
          {
              this.departmentName = `${this.messages[this.lang].departments} №${office[0].related_office.id}`;
              this.isEmptyDepartment = true;
          }
      },
    switcherValues(btnName) {
      this.btnSwitchTrue = false;
      this.btnSwitchFalse = false;

      this[btnName] = true;
    },
    handlerSelect(prop) {
        this[prop] = !this[prop]
    },
      notificationForm() {
          this.$emit('visible-notification')
      },
    handleSend() {
        var form = new FormData();

        form.append('tariff',this.formDataSend.tariff);
        form.append('weight',this.formDataSend.weight);
        form.append('category',this.formDataSend.category);
        form.append('hallmark',this.formDataSend.hallmark);
        form.append('stone',this.formDataSend.stone);
        form.append('client_status',this.formDataSend.client_status);
        form.append('term',this.formDataSend.term);
        form.append('overpayment',this.formDataSend.overpayment);
        form.append('amount',this.formDataSend.amount);
        form.append('name',this.formDataSend.name);
        form.append('phone',this.formDataSend.phone);
        form.append('file',this.file);
        let _th = this;
        this.notificationForm();
        axios({
            method: 'post',
            url: '/calculator/requests',
            data: form,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Content-Type': 'application/json'},
            // withCredentials: true,
        }).then(function(response) {
            _th.notificationForm();
            _th.hidePopap();
        }).catch(function(error) {
            //onErrorSubmit();
            // PopupModule.closePopup(document.getElementById('popupRequest'));
            console.log(error);
        });
    },

    hidePopap() {
      this.$parent.isVisiblePopap = false;
    },

   handleChange() {

			this.visibleSelected = false;
            this.file = this.$refs.file.files[0];
			this.selectedImage = this.$refs.file.files[0].name;
    },
      getOptionInSelect({currentTarget}, prop, propname, propEmpty, drop) {
          if (propEmpty == 'isEptyDepartment') {
              this.isEmptyDepartment = true
          } else if (propEmpty == 'isEmptyProbe') {
              this.isEmptyProbe = true
          } else if (propEmpty == 'isEmptyDiscount') {
              this.isEmptyDiscount = true
          }

          if (this[drop] != true) {
              this[drop] = true
          }

          this[propname] = currentTarget.getAttribute("data-name")
          this.formData[prop] = currentTarget.value;

      },
  },

  beforeMount(){
    //  this.getUnits()
  },

  computed: {
    isDisabledScrap() {
      return validateForm(this.required, this.formDataSend);
    },


    messages: () => messages,
  },

  created() {
    
  },

   mounted() {
    this.setLang();
       this.handleView();
       window.addEventListener('mouseup', () => {
           if (this.dropdownyDepartment === true) {
               this.dropdownyDepartment = false;
           }
       });
       this.setDepartament();
       this.formDataSend.tariff = this.formData.department;
       this.formDataSend.weight = this.formData.weight;
       this.formDataSend.category = this.formData.category;
       this.formDataSend.hallmark = this.formData.probe;
       this.formDataSend.stone = this.formData.isInserts;
       this.formDataSend.client_status = this.formData.discount;
       this.formDataSend.term = this.formData.creditDays;
       this.formDataSend.overpayment = this.formDataSend.giveShortAwayComputedResult = this.formData.giveShortAwayComputedResult;
       this.formDataSend.giveAwayComputedResult = this.formData.giveAwayComputedResult;
       this.formDataSend.amount = this.formDataSend.giveComputedResult = this.formData.giveComputedResult;

  },
}
</script>