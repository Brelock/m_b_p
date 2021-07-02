<template>
  <div>
        <div class="flex_wrapper">
          <div class="wrap-input-form mob_mb_20"> 
            <div class="col-input">
              <div class="section-input" @click="focusOnInput">
                  <span class="sup-title">{{ messages[lang].product__weight }}</span>
                  <input class="isCheck"
                        id="weight"
                        autocomplete="off"
                        v-model.trim="formData.weight" 
                        type="number" 
                        :placeholder="messages[lang].weight_placeholder"
                        >
              </div>
            </div>

            <div class="col-input">
             	<div class="section-input" @click="handlerSelect('dropdownyProbe')">
									<span class="sup-title"> {{ messages[lang].product__sample }} </span>
									<span :class="[{active: dropdownyProbe}, 'icon-arrow-down-gray']"></span>

									<div class="customSelect" v-if="!tabletView" >

										<a class="chosen-single"> 
											<input hidden type="text" 
															v-model="formData.probe"
															>
											<span v-show="!isEmptyProbe" class="placeholder">{{ messages[lang].product__probe }}</span>
											<span else class="placeholder">{{ prodeName }}</span>
										</a>

										<ul class="dropdownSelect" v-show="dropdownyProbe">
											<li class="option" v-for="probe in probes"
												@click="getOptionInSelect($event, 'probe', 'prodeName', 'isEmptyProbe', 'dropdownyProbe')"
												:key="`probe-${probe.id}`"
												:data-name="probe.hallmark"
												:value="probe.id"
											>{{probe.hallmark}}</li>
										</ul>

									</div>

									<select v-if="tabletView"
											name="probe"
											id="probe"
											class="isCheck"
											v-model="formData.probe"
									>
										<option disabled :value="0"> {{ messages[lang].product__probe }} </option>
										<option v-for="probe in probes"
												:key="`probe-${probe.id}`"
												:value="probe.id"
										>{{probe.hallmark}}</option>
									</select>

								</div>
            </div>
          </div>
          <div class="wrap-btn-forms">
            <button type="button" 
              @click="handleSubmit" 
                   :disabled="isDisabled"
                   :class="[{ disabled: isDisabled }, 'button']">
                   {{ messages[lang].calculate__btn }}
              <div v-show="isVisibleSpiner" class="spinner spinner--search"></div>
           </button>
              <!-- v-if="!visibleResetBtn" -->

            <button type="button" 
              v-if="visibleResetBtn"
              @click="formZeroing"
                   class="button resetButton">
                   {{ messages[lang].to_back }}
           </button>
          </div>
          
        </div>
  </div>
</template>


<script>

import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import { validateForm } from '../../mixins/validateForm';
import { api } from '../../api';
// import loginVue from '../../../../../../../shop.nuxt/pages/login.vue';

export default {
 mixins: [ lang ],

  data() {
    return {
      visibleResetBtn: false,
        probes:[],
        departments: [],
        status:[],
      visible: false,
	    tabletView: false,
      dropdownyProbe: false,
      isEmptyProbe: false,
      isVisibleSpiner: false,
      prodeName: '',
      formData: {
		  weight: '',
		  probe: 0 ,
		  giveShortAwayComputedResult:0,
          giveFullAwayComputedResult:0,
		  giveComputedResult:0,
          prodeName:'',
      },
      required: ['weight','probe']
    };
  },

  // props: ['categoryId'],

  methods: {
    getUnits: function() {

    },

		handleView() {
      window.innerWidth <= 992
        ? (this.tabletView = true)
        : (this.tabletView = false);
    },

    reincarnationBtn: function() {
        this.visibleResetBtn = true;
        this.isVisibleSpiner = false;
    },

    formZeroing() {
        this.visibleResetBtn = false 
        this.$emit('reset-form')
    },

    handleSubmit() {
        this.isVisibleSpiner = true;
        let value = 0;
        let hallmarkPrice = this.probes.filter(item => {
            return item.id == this.formData.probe;
        });
        if(hallmarkPrice.length > 0 && this.formData.weight > 0)
        {
            value = hallmarkPrice[0].lom * this.formData.weight;
          this.reincarnationBtn()
        }


        this.formData.giveShortAwayComputedResult = 0;
        this.formData.giveFullAwayComputedResult = 0;
        this.formData.giveComputedResult = Math.ceil((value)*100)/100;
        this.$parent.$parent.formData = this.formData;
        this.$parent.$parent.departments = this.departments;
        this.$parent.$parent.responseForm = false;

        //  this.isVisibleSpiner = false;
    },

    focusOnInput({currentTarget}) {
    	currentTarget.querySelector('input').focus();
    },

		getOptionInSelect({currentTarget}, prop, propname, propEmpty, drop) {
			if (propEmpty == 'isEmptyProbe') {
				this.isEmptyProbe = true
      }

		  if (this[drop] != true) {
				this[drop] = true
			}

			this[propname] = currentTarget.getAttribute("data-name")
            this.formData[propname] = currentTarget.getAttribute("data-name")
			this.formData[prop] = currentTarget.value;
		},

    handlerSelect(prop) {
			this[prop] = !this[prop]
		},
      loadData: function loadData() {
          axios.get('/calculator/get-data', { params: { 'categoryId': this.$parent.categoryId } })
              .then(response =>
              {
                  this.departments = response.data.tariffs
                  this.probes = response.data.probe
                  this.status = response.data.status
                  // this.formZeroing();
              })
              .catch(error => console.log(error));


      },
  },

  computed: {
    isDisabled() {
      return validateForm(this.required, this.formData);
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
		  } else if (this.dropdownyProbe === true) {
		    this.dropdownyProbe = false;
		  } else if (this.dropdownyDiscount === true) {
		    this.dropdownyDiscount = false;
		  }
		});
       this.loadData();
  },
}
</script>