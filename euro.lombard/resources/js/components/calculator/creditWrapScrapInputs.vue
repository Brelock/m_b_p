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
                        type="text" 
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
          </div>
            <button type="button" 
              @click="handleSubmit" 

                   :disabled="isDisabled"
                   :class="[{ disabled: isDisabled }, 'button']">
                   {{ messages[lang].calculate__btn }}
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

  data() {
    return {
      visible: false,
	    tabletView: false,
      dropdownyProbe: false,
      isEmptyProbe: false,
			formSaving: false,
      prodeName: '',
      formData: {
        weight: '',
        probe: 0 
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

    handleSubmit() {
    	const payload = {
    		data: this.formData,
    		// withFile: !!this.formData.images.length,
    	}

    	this.formSaving = true;
    	// console.log(payload)
    	api('POST', '/tech', payload).then(() => {
    	  this.formSaving = false;
    	  // show notification
    	}).catch((error) => {
    	  // show notification
    	})
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

    prodeList: () => ([
			{id:1, title: 999},
			{id:2, title: 958},
			{id:3, title: 916},
			{id:4, title: 875},
			{id:5, title: 750},
		]),

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
  },
}
</script>