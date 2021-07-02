<template>
	<div>
				<div class="flex_wrapper">
					<div class="wrap-input-form mob_mb_20">

							<div class="col-input">
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
												@click="getOptionInSelect($event, 'department', 'departmentName', 'isEptyDepartment', 'dropdownyDepartment',department.terms)"
												:key="`city-${department.related_office.id}`"
												:data-name='`${messages[lang].departments} №${department.related_office.id}`'
												:value="department.related_office.id"
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
										>№ {{ department.related_office.id }} {{department.related_office['city_location']}}, {{department.related_office[`address_${lang}`]}}</option>
									</select>

								</div>

								<div class="section-input" @click="focusOnInput">
									<span class="sup-title">{{ messages[lang].product__weight }}</span>
									<input class="isCheck"
												id="weight"
												v-model.trim="formData.weight" 
												type="number" 
												autocomplete="off"
												:placeholder="messages[lang].weight_placeholder"
												>
								</div>

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

							<div class="col-input">
								
								<div class="wrapper-btn-check">
									<span class="title-btn-check"> {{ messages[lang].stones_and_inserts }} </span>
									<div>
										<span 
											@click="switcherValues" :class="[{active: formData.isInserts}, 'btn-check']">
											{{ messages[lang].true }} 
										</span>
										<span @click="switcherValues" :class="[{active: !formData.isInserts}, 'btn-check']">
											{{ messages[lang].false }}
										</span>
									</div>
								</div>

								<div class="section-input" @click="handlerSelect('dropdownyDiscount')">
									<span class="sup-title">{{ messages[lang].placeholder_discount }}</span>
									<span :class="[{active: dropdownyDiscount}, 'icon-arrow-down-gray']"></span>

									<div class="customSelect" v-if="!tabletView" >

										<a class="chosen-single"> 
											<input hidden type="text" 
															v-model="formData.discount"
															>
											<span v-show="!isEmptyDiscount" class="placeholder">{{ messages[lang].no_discount }}</span>
											<span else class="placeholder">{{ discountName }}</span>
										</a>

										<ul class="dropdownSelect" v-show="dropdownyDiscount">
											<li class="option"
												:value="false"
												:data-name="messages[lang].no_discount"
												@click="getOptionInSelect($event, 'discount', 'discountName', 'isEmptyDiscount', 'dropdownyDiscount')">{{ messages[lang].no_discount }}</li>
											<li class="option" v-for="discount in status"
												@click="getOptionInSelect($event, 'discount', 'discountName', 'isEmptyDiscount', 'dropdownyDiscount')"
												:key="`discount-${discount.id}`"
												:data-name="discount[`title_${lang}`]"
												:value="discount.id"
											  >{{discount[`title_${lang}`]}}</li>
										</ul>

									</div>

									<select v-if="tabletView"
													name="discount" 
													id="discount"
													v-model="formData.discount"
													>
										<option :value="false">{{ messages[lang].no_discount }} </option>
										<option v-for="discount in status"
												:value="discount.id"
										>{{discount[`title_${lang}`]}}</option>
									</select>
								</div>

								<div class="section-input ui-slider">
									<span class="sup-title"> {{ messages[lang].lending_term }} </span>
										<uiSlider @updateSlider="updateCreditDay" v-bind:slider="slider"></uiSlider>
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
import uiSlider from './uiSlider.vue'
export default {
 mixins: [ lang ],
 components: {
    uiSlider,
  },

	data() {
		return {
			visibleResetBtn: false,
      		departments: [],
			probes:[],
			status:[],
			visible: false,
			tabletView: false,
			dropdownyDepartment: false,
			dropdownyProbe: false,
			dropdownyDiscount: false,
			isVisibleSpiner: false,
			isEmptyDepartment: false,
			isEmptyProbe: false,
			isEmptyDiscount: false,

			departmentName: '',
			prodeName: '',
			discountName: '',

			formData: {
				department: 0,
				weight: '',
				probe: 0,
				isInserts: false,
				discount: 0,
				creditDays: 1,
                giveShortAwayComputedResult:0,
                giveAwayComputedResult:0,
                giveComputedResult:0,
				category:0,
				categoryName:'',
                discountName:'',
                prodeName:'',
                departmentName:''
			},
            slider: {
                min: 1,
                max: 30,
                start: 1,
                step: 1
            },
            required: ['department','weight','probe'],
		};
	},

	// props: ['categoryId'],

	methods: {
		getUnits: function() {

		},
		reincarnationBtn: function() {
        this.visibleResetBtn = true;
				this.isVisibleSpiner = false;
    },

    formZeroing() {
        this.visibleResetBtn = false 
        this.$emit('reset-form')
    },

		updateCreditDay(val) {
			this.formData.creditDays = Number(val)
		},

		handleView() {
      window.innerWidth <= 992
        ? (this.tabletView = true)
        : (this.tabletView = false);
    },

		switcherValues() {
			this.formData.isInserts = !this.formData.isInserts
		},

		handleSubmit() {
			this.isVisibleSpiner = true;
  			this.reincarnationBtn();
            let value = 0;
            let hallmarkPrice = this.probes.filter(item => {
                return item.id == this.formData.probe;
            });
            if(hallmarkPrice.length > 0 && this.formData.weight > 0)
            {
                value = hallmarkPrice[0].zalog * this.formData.weight;
            }
            let officePrice = this.departments.filter(item => {
                return item.related_office.id == this.formData.department;
            });
			let range = officePrice[0].terms.filter(item => {
                return (item.from <= this.formData.creditDays && item.to >= this.formData.creditDays && item.calc_category_id == this.$parent.categoryId);
            });
            let valueAway = 0;
            let valueShortAway = 0;
			if(this.formData.discount && this.formData.discount != 0)
			{
                let statusPercent = this.status.filter(item => {
                    return item.id == this.formData.discount;
                });
                valueAway = value + ((value/100*(range[0].value-range[0].value/100*statusPercent[0].percent))*this.formData.creditDays);
                valueShortAway = (value/100*(range[0].value-range[0].value/100*statusPercent[0].percent))*this.formData.creditDays;
			}
			else
			{
                valueAway = value + ((value/100*range[0].value)*this.formData.creditDays);
                valueShortAway = (value/100*range[0].value)*this.formData.creditDays;
			}

            this.formData.giveShortAwayComputedResult = Math.ceil((valueShortAway)*100)/100;
            this.formData.giveFullAwayComputedResult = Math.ceil((valueAway)*100)/100;
            this.formData.giveComputedResult = Math.ceil((value)*100)/100;
            this.$parent.$parent.formData = this.formData;
            this.$parent.$parent.departments = this.departments;
    	  this.$parent.$parent.responseForm = false;
    	  // show notification


			// this.$emit('submitForm', payload);
		},

		focusOnInput({currentTarget}) {
    	currentTarget.querySelector('input').focus()
    },

		getOptionInSelect({currentTarget}, prop, propname, propEmpty, drop, term = []) {
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
            this.formData[propname] = currentTarget.getAttribute("data-name")
			this.formData[prop] = currentTarget.value;

			if(prop == 'department')
			{
                this.maxminDay(term);
			}
		},
        maxminDay(term){
		    let min=999999,max=0,thisCategoryId = this.$parent.categoryId;
            $.each(term, function(key, value) {
                if(value.calc_category_id == thisCategoryId)
				{
                    if (value.from < min) {
                        min = value.from;
                    }
                    if (value.to > max) {
                        max = value.to;
                    }
				}

            });
            this.slider.start = min;
            this.slider.min = min;
            this.slider.max = max;

            slider.noUiSlider.updateOptions({
                range: {
                    'min': this.slider.min,
                    'max': this.slider.max
                }
            });
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
    	this.formData.category = this.$parent.categoryId;
    	if(this.formData.category == 1)
		{
		    this.formData.categoryName = this.messages[this.lang].gold;
		}
		else
		{
            this.formData.categoryName = this.messages[this.lang].silver;
		}
	},
}
</script>