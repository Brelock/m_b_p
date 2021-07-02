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
											<li class="option" v-for="city in citiesList"
												@click="getOptionInSelect($event, 'department', 'departmentName', 'isEptyDepartment', 'dropdownyDepartment')"
												:key="`city-${city.id}`"
												:data-name="city[`title_${lang}`]"
												:value="city.id"
											  >{{city[`title_${lang}`]}}</li>
										</ul>

									</div>

									<select v-if="tabletView"
													name="department" 
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

								<div class="section-input" @click="focusOnInput">
									<span class="sup-title">{{ messages[lang].product__weight }}</span>
									<input class="isCheck"
												id="weight"
												v-model.trim="formData.weight" 
												type="text" 
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
											<li class="option" v-for="probe in prodeList"
												@click="getOptionInSelect($event, 'probe', 'prodeName', 'isEmptyProbe', 'dropdownyProbe')"
												:key="`probe-${probe.id}`"
												:data-name="probe[`title`]"
												:value="probe.id"
											  >{{probe[`title`]}}</li>
										</ul>

									</div>

									<select v-if="tabletView"
													name="probe" 
													id="probe" 
													class="isCheck"
													v-model="formData.probe" 
													>
										<option disabled :value="0"> {{ messages[lang].product__probe }} </option>
										<option v-for="probe in prodeList"
											:key="`probe-${probe.id}`"
											:value="probe.id"
										>{{probe[`title`]}}</option>
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
															v-model="formData.probe"
															>
											<span v-show="!isEmptyDiscount" class="placeholder">{{ messages[lang].no_discount }}</span>
											<span else class="placeholder">{{ discountName }}</span>
										</a>

										<ul class="dropdownSelect" v-show="dropdownyDiscount">
											<li class="option" v-for="discount in discountList"
												@click="getOptionInSelect($event, 'discount', 'discountName', 'isEmptyDiscount', 'dropdownyDiscount')"
												:key="`discount-${discount.val}`"
												:data-name="discount[`title_${lang}`]"
												:value="discount.val"
											  >{{discount[`title_${lang}`]}}</li>
										</ul>

									</div>

									<select v-if="tabletView"
													name="discount" 
													id="discount"
													v-model="formData.discount"
													>
										<option :value="false">{{ messages[lang].no_discount }} </option>
										<option :value="true">{{ messages[lang].discount }}</option>
									</select>
								</div>

								<div class="section-input ui-slider">
									<span class="sup-title"> {{ messages[lang].lending_term }} </span>
									<uiSlider @updateSlider="updateCreditDay"></uiSlider>
								</div>
							</div>

					</div>
						<button type="button"
							v-if="visibleSubmitForm"
							@click="handleSubmit" 
									 :disabled="isDisabled"
									 :class="[{ disabled: isDisabled }, 'button']">
									 {{ messages[lang].calculate__btn }}
					 	</button>

						<button type="button"
							v-if="!visibleSubmitForm"
							@click="resetForm" 
									 class="resetButton button">
									 {{ messages[lang].to_back }}
					 	</button>

				</div>
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
    uiSlider: () => import(/* webpackChunkName: "uiSlider" */ './uiSlider.vue'),
  },

	data() {
		return {
			visible: false,
			tabletView: false,
			visibleSubmitForm: true,
			dropdownyDepartment: false,
			dropdownyProbe: false,
			dropdownyDiscount: false,
			formSaving: false,
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
				discount: false,
				creditDays: 1,
			},
			required: ['department','weight','probe']

		};
	},

	// props: ['categoryId'],

	methods: {
		getUnits: function() {

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
    	const payload = {
    		data: this.formData,
    		// withFile: !!this.formData.images.length,
    	}

    	this.formSaving = true;
    	// console.log(payload)
				this.visibleSubmitForm = false
/*     	api('POST', '/tech', payload).then(() => {
    	  this.formSaving = false;
    	  // show notification
    	}).catch((error) => {
    	  // show notification
    	}) */

			// this.$emit('submitForm', payload);
		},

		resetForm() {
			this.$emit('resetForm', 'valvalval');
		},

		focusOnInput({currentTarget}) {
    	currentTarget.querySelector('input').focus()
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

		handlerSelect(prop) {
			this[prop] = !this[prop]
		},

	},

	computed: {
		isDisabled() {
			return validateForm(this.required, this.formData);
		},

		citiesList: () => ([
			{id:1, title_ru: 'Запорожье', title_ua: 'Запорiжжя' },
			{id:2, title_ru: 'Днепр', title_ua: 'Днепр' },
			{id:3, title_ru: 'Киев', title_ua: 'Киев' },
			{id:4, title_ru: 'Харьков', title_ua: 'Харкiв' },
		]),

		prodeList: () => ([
			{id:1, title: 999},
			{id:2, title: 958},
			{id:3, title: 916},
			{id:4, title: 875},
			{id:5, title: 750},
		]),

		discountList: () => ([
			{val:false, title_ru: 'Без дисконта', title_ua: 'Без дисконту'},
			{val:true, title_ru: 'С дисконтом', title_ua: 'З дисконтом'}
		]),
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
	},
}
</script>