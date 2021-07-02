<template>
	<div>
		<form action="#" class="calc-form" @submit.prevent="handleSubmit">
			<div class="progress-bar-container">
				<div class="prev-button" v-show="progress != 1">
					<button type="button"
						@click="()=>toggleProgress(-1)"
						>
						<span class="icon-arrow-l-secondColor"></span>
					</button>
				</div>

				<div class="progress-item" :class="{active: progress >= 1}">
					<div class="number"> <span>1</span></div>
					<div class="label">{{ messages[lang].device }}</div>
				</div>
				<div class="progress-item" :class="{active: progress >= 2}">
					<div class="number"> <span>2</span> </div>
					<div class="label">{{ messages[lang].state }}</div>
				</div>
				<div class="progress-item" :class="{active: progress >= 3}">
					<div class="number"> <span>3</span> </div>
					<div class="label">{{ messages[lang].kit }}</div>
				</div>
				<div class="progress-item" :class="{active: progress >= 4}">
					<div class="number"> <span>4</span> </div>
					<div class="label">{{ messages[lang].data }}</div>
				</div>
			</div>

			<div class="form-body" v-show="progress == 1">
				<div class="wrap-input-form mob_mb_20">
					<div class="col-input">
						<div class="section-input" @click="focusOnInput">
							<span class="sup-title">{{ messages[lang].type_of_equipment }}</span>
							<input class="isCheck"
										v-model.trim="formData.type" 
										type="text" 
										autocomplete="off"
										:placeholder="messages[lang].type_placeholder"
							>
						</div>

						<div class="section-input" @click="focusOnInput">
							<span class="sup-title">{{ messages[lang].model }}</span>
							<input class="isCheck"
										v-model.trim="formData.model" 
										type="text" 
										autocomplete="off"
										:placeholder="messages[lang].model_placeholder"
										>
						</div>
					</div>

					<div class="col-input">
						<div class="section-input" @click="focusOnInput">
							<span class="sup-title">{{ messages[lang].brand }}</span>
							<input class="isCheck"
										v-model.trim="formData.brand" 
										type="text" 
										autocomplete="off"
										:placeholder="messages[lang].brand_placeholder"
										>
						</div>

						<div class="section-input" @click="focusOnInput">
							<input class="isCheck"
										autocomplete="off"
										multiple
										id="getFile"
									 	type="file"
									 	accept="image/jpg, image/jpeg, image/svg, image/png, image/gif"
										@change="handleSelectImage"
							> 
										<!-- @change="handleSelectImage($event.target.files)" -->
							<label class="getFile" for="getFile">
								<span class="get_file_title" v-if="showSelectedFiles">{{ messages[lang].device_photo }}</span>
								<span class="get_file_title" v-else>{{ selectedImage }}</span>
								<span class="icon-get-photo"></span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<!-- ---------------- -->
			<div class="form-body" v-show="progress == 2">
				<div class="radio-buttons-container">
					<div class="radio-item"
						v-for="item in techConditions"
						:key="`condition-${item.id}`"
					>
						<input :id="`c_input-${item.id}`" type="radio" class="custom-radio" name="condition"
							:value="item.label"
							v-model="formData.condition"
						/>
						<label :for="`c_input-${item.id}`"><span>{{ item.label }}</span></label>
					</div>
				</div>
			</div>

			<!-- ---------------- -->
			<div class="form-body" v-show="progress == 3">
				<div class="radio-buttons-container">
					<div class="radio-item"
						v-for="item in techKits"
						:key="`kit-${item.id}`"
					>
						<input :id="`kit_input-${item.id}`" type="radio" class="custom-radio" name="kit"
							:value="item.label"
							v-model="formData.kit"
						/>
						<label :for="`kit_input-${item.id}`"><span>{{ item.label }}</span></label>
					</div>
				</div>
			</div>

			<div class="form-body mob_mb_20" v-show="progress == 4">
				<div class="title-section">
					{{ messages[lang].data_device_description }}
				</div>

				<div class="wrap-input-form mb_0">
					<div class="col-input">
						<div class="section-input" @click="focusOnInput">
							<span class="sup-title">{{ messages[lang].full_name_user }}</span>
							<input class="isCheck"
										v-model.trim="formData.user_name" 
										type="text" 
										autocomplete="off"
										:placeholder="messages[lang].full_name_user_placeholder"
							>
						</div>
					</div>
					<div class="col-input">
						<div class="section-input" @click="focusOnInput">
							<span class="sup-title">{{ messages[lang].phone }}</span>
							<input class="isCheck"
										v-model.trim="formData.phone_number" 
										type="number" 
										autocomplete="off"
										:placeholder="messages[lang].phone_placholder"
							>
						</div>
					</div>
				</div>

				<div class="check-box">
					<input id="eula" type="checkbox"  v-model="eula">
					<label for="eula" class="checkbox-label"></label>
					<span>{{ messages[lang].person_data_check}}</span>
				</div>
			</div>

			<!-- -------------------- -->
			 <button type="button" v-show="progress != 4"
			 				:disabled="isDisabled"
			 				@click="()=>toggleProgress(1)"
			        :class="[{ disabled: isDisabled }, 'button']">{{ messages[lang].next}}
			</button>

			 <button type="submit" v-show="progress == 4"
			        :disabled="isDisabled || !eula"
			        :class="[{ disabled: isDisabled || !eula }, 'button']">
			        {{ messages[lang].send }}
			</button>
		</form>
	</div>
</template>


<script>
import { lang } from '../../mixins';
import { messages } from '../../helpers/messages';
import { validateForm } from '../../mixins/validateForm';
import { api } from '../../api';

export default {
 mixins: [ lang ],

	data() {
		return {
			progress: 1,
			eula: false,
			// isDisabled: true,
			selectedImage:  '',
			selImg: "",
			showSelectedFiles: true,
			formSaving: false,

			formData: {
				type: "",
				model: "",
				brand: "",
				condition: null,
				kit: null,
				user_name: '',
				phone_number: '',
				images: []
			},

		};
	},


	methods: {
		dispatchFormData() {
				this.$parent.isResultListTech = true;
            	this.$parent.formData = this.formData;
		},

		toggleProgress(val) {
			this.progress += val;
			if (this.progress == 4) {
				this.dispatchFormData();
			}
		},

    handleSelectImage({target}) {
    	const { files } = target;
    	this.formData.images = [];

    	if (files.length) {
    		this.selectedImage = files[0].name;
    		// this.selectedImage = files;
    		for(const img of files) {
    			this.formData.images.push(img);    			
    		}
    		this.showSelectedFiles = false;
    	}
			// console.log(target.files)
    },

    focusOnInput({currentTarget}) {
    	currentTarget.querySelector('input').focus();
    },
    updateForm() {
        this.$emit('reset-resulp-block')
    },
		notificationForm() {
      	this.$emit('visible-notification')
    },		
    handleSubmit() {
    	this.formSaving = true;
    	// console.log(payload)
        var form = new FormData();

        form.append('category',this.formData.type);
        form.append('model',this.formData.model);
        form.append('brand',this.formData.brand);
        form.append('condition',this.formData.condition);
        form.append('set',this.formData.kit);
        form.append('name',this.formData.user_name);
        form.append('phone',this.formData.phone_number);
        for(let i=0; i<this.formData.images.length;i++){
            form.append('pics[]',this.formData.images[i]);
        }
        let _th = this;
        axios({
            method: 'post',
            url: '/calculator/gadgets-requests',
            data: form,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Content-Type': 'application/json'},
            // withCredentials: true,
        }).then(function(response) {
            _th.notificationForm();
            _th.updateForm();
            _th.progress = 1,
			_th.formData= [{
				type: "",
				model: "",
				brand: "",
				condition: null,
				kit: null,
				user_name: '',
				phone_number: '',
				images: []
			}]
        }).catch(function(error) {
            //onErrorSubmit();
            // PopupModule.closePopup(document.getElementById('popupRequest'));
            console.log(error);
        });


    	// this.$emit('submitForm', payload);
    },
        handleView() {
            window.innerWidth <= 992
                ? (this.tabletView = true)
                : (this.tabletView = false);
        },
	},

	computed: {
		isDisabled() {
			return validateForm(this.required_fields, this.formData);
    },

    required_fields() {
    	let result;
    	switch (this.progress) {
    		case 1: result = ['type', 'model', 'brand']; break;
    		case 2: result = ['condition']; break;
    		case 3: result = ['kit']; break;
    		case 4: result = ['user_name', 'phone_number']; break;
    		default: [];
    	}
    	return result;
    },

		messages: () => messages,

		techConditions: (that) => [
			{ id:1, label: messages[that.lang].perfect_state },
			{ id:2, label: messages[that.lang].good_state },
			{ id:3, label: messages[that.lang].bad_state },
		],

		techKits: (that) => [
			{ id:1, label: messages[that.lang].full_kit },
			{ id:2, label: messages[that.lang].partial_kit },
			{ id:3, label: messages[that.lang].absent_kit },
		]
	},

	created() {
	},

	mounted() {
        this.setLang();
        this.handleView();
	},

}
</script>