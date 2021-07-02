<template>
	<div class="checkoutPage page cart-category">
		<client-only>
			<form action="/" name=checkout-form @submit.prevent="submit"
				class="pageSection ">
				<div class="mcontainer">
					<div class="sectionHeader sectionBlock">
						<BreadCrumbs :items="crumbs" :i18n="$i18n" @localePath="localePath"/>						
						
						<h1 class="page-title medium">{{$t('common.cart')}}</h1>
					</div>
				
					<div class="sectionBlock">
						<div class="flex wrap main-section-block ">
							<div class="formContentBlock standard-form mcol-xs-12 mcol-md-8 mcol-lg-9">
								<AuthTabsBlock justify inlineRemote
									className="form-section"
									:tabsList="tabsList"
									v-if="!authUser"
								/>

								<div v-else class="form-section content-container  mcol-xs-12 mcol-sm-6 mcol-md-4">
									<div class="title form-section-title">{{$t('phrase.contact_info')}}</div>

									<div class="formRow" v-text="authUser.first_name"></div>
									<div class="formRow" v-text="authUser.last_name"></div>
									<div class="formRow" >
										<input type="text" :placeholder="$t('form.phone')" v-model="user_phone"/>
									</div>
									<div class="formRow" v-text="authUser.email"></div>
								</div>

								<div class="content-container form-section relative">
									<CoverOverlay :active="!authUser"
										:z="250" lighten	@onClick="()=>{}"
									/>

									<div class="form-section">
										<div class="title form-section-title">{{$t('phrase.delivery_method')}}</div>

										<div class="formRow customCheckboxContainer flex wrap" >
											<div class="formElement mcol-xs-12 mcol-sm-4 mcol-md-3"
												v-for="item in deliveryTypesList"
												:key="`delivery_item-${item.id}`">
												<el-radio v-model="formData.delivery_type"
													class=""
													:label="item.id">
													{{ item[`title_${$i18n.locale }`] }}
												</el-radio>
											</div>
										</div>

										<div class="formRow delivery-group"
											v-show="formData.delivery_type === DELIVERY_TYPES.NOVA_POSHTA">
											<div class="formRow mrow flex wrap">
												<div class="formBlock mcol-xs-12 mcol-sm-4 mcol-md-6 mcol-lg-4 relative">
													<SimpleSpinner :active="citiesLoading" small/>
														<!-- :disabled="citiesLoading" -->
													<el-select filterable
														:filter-method="citiesQuery"
														v-model="nova_poshtaForm.novaposhta_city_id"
														:placeholder="$t('form.choose_delivery_city')"
													>
														<el-option
															v-for="item in citiesList"
															:key="'city_id-' + item.id"
															:label="item[`description_${$i18n.locale }`]"
															:value="item.id"
														/>
													</el-select>
												</div>

												<div class="formBlock mcol-xs-12 mcol-sm-4 mcol-md-6 mcol-lg-4">
													<el-select filterable
														:disabled="!warehousesList.length"
														v-model="selectedWarehouse"
														:placeholder="$t('form.choose_post_office')"
													>
														<el-option
															v-for="item in warehousesList"
															:key="'warehouse_id-' + item.id"
															:label="item[`description_${$i18n.locale }`]"
															:value="item"
														/>
													</el-select>
												</div>
											</div>

											<div class="formRow mcol-xs-12 mcol-sm-6 mcol-md-4"
												v-if="formData.delivery_type === DELIVERY_TYPES.NOVA_POSHTA">
												<div class="formRow">
													<input type="text" :placeholder="$t('form.last_name')" 
														v-model="nova_poshtaForm.novaposhta_last_name" required/>
												</div>
												<div class="formRow">
													<input type="text" :placeholder="$t('form.first_name')" 
														v-model="nova_poshtaForm.novaposhta_first_name" required/>
												</div>
												<div class="formRow" >
													<input type="text" :placeholder="$t('form.middle_name')" 
														v-model="nova_poshtaForm.novaposhta_middle_name" required/>
												</div>
												<!-- <div class="formRow">
													<input type="text" placeholder="Телефон" 
														v-model="nova_poshtaForm.novaposhta_phone_number" required/>
												</div> -->
											</div>											
										</div>
									</div>

									<div class="form-section">
										<div class="title form-section-title">{{ $t('phrase.payment_method')}}</div>

										<div class="formRow customCheckboxContainer flex wrap" >
											<div class="formElement mcol-xs-12 mcol-sm-4 mcol-md-3"
												v-for="item in paymentsTypesList"
												:key="`payment_item-${item.id}`">
												<el-radio v-model="formData.payment_type"
													class=""
													:label="item.id">
													{{ item[`title_${$i18n.locale }`] }}
												</el-radio>
											</div>
										</div>

										<!-- <div id="payment2" class="formRow hiddenContent hide payment-group">
											<div class="mrow flex wrap">
												<div class="formBlock mcol-xs-12 mcol-sm-4 mcol-md-6 mcol-lg-4">
													<input type="text" placeholder="Введите номер банковской карточки">
												</div>
											</div>
										</div> -->
									</div>

									<div class="form-section">
										<div class="title form-section-title">{{ $t('phrase.order_comment')}}</div>

										<div class="formRow">
											<textarea name="message"  rows="7" 
												v-model="formData.comment"
												:placeholder="`${$t('phrase.look_when_processing_order')}?`">
											</textarea>                        
										</div>
									</div>
								</div>
							</div>

							<div class="resultBlock mcol-xs-12 mcol-md-4 mcol-lg-3 standard-form" v-if="cartData">
								<div class="content-container">
									<div class="form-section">
										<div class="title form-section-title">{{$t('phrase.order_list')}}</div>

										<div class="cart-list" v-if="cartData">
											<div class="list-item medium flex" 
											v-for="item in cartData.orderProducts"
											:key="`result_cart-${item.id}`">
												<div class="mcol-xs-3 imgWrapper">
													<img :src="getProdImgSrc(item.product.pictures[0], item.product.id, /*'picture_thumb_file_name'*/)" alt="prod img error">
												</div>

												<div class="mcol-xs-9">
													<div class="name" v-text="item.product[`title_${$i18n.locale }`]"></div>
													<div class="result">
														<span class="items-quantity" 
															v-text="`${item.quantity} шт. x`"></span>
														<span><b v-text="`${item.price} грн`"></b></span>
													</div>
												</div>
											</div>
										</div>
									</div>   

									<div class="form-section result-section">
										<div class="formRow final-amount-row capitalize-first">
											<span class="medium muted">{{$t('common.total')}}</span>
											<div class="total-price push-right">
												<b v-text="`${cartData.final_amount} грн`"></b>
											</div>
										</div>

										<div class="formRow limitedWidthWrapper">
											<button :disabled="!authUser"
												type="submit" 
												:class="['standardButton primary uppercase',
												{'disabled': !authUser}]
												">{{$t('phrase.pay_order')}}</button>
										</div>

										<div class="formRow customCheckboxContainer eulaBlock">
											<!-- <el-checkbox v-model="isAgreedPersonalData">
												<span class="">{{$t('form.personal_data_approve')}}.</span>
											</el-checkbox> -->

											<!-- <input id="eula" type="checkbox" class="">
											<label for="eula"><span class="checkbox-label">Я согласен на обработку <a href="#">персональных данных</a>, а также с условиями <a href="#">оферты</a>.</span></label> -->
										</div>
									</div>
								</div>
							</div>				 
						</div>
					</div>
				</div>
			</form>
		</client-only>
	</div>  
</template>

<script>
	import { mapState, mapActions } from 'vuex';

	import CoverOverlay from '@/components/CoverOverlay';
	// import SearchBar from '@/components/SearchBar';
	// import NavMenuItem from './NavMenuItem.vue';
	import { eventHandler, tabsMixin, breadcrumbsFromPathMixin, seoMixin } from '@/mixins';
	import {
		cloneDeep,
		findItemBy,
		getProdImgSrc,
		getLocaleCode,
		removeObjProps,
		getSeoLink
	} from '@/helpers';

	import { DELIVERY_TYPES, deliveryTypesList, PAYMENTS_TYPES, paymentsTypesList } from '@/constants/global';
	
	export default {
		name: 'checkout',
		mixins: [eventHandler, tabsMixin, breadcrumbsFromPathMixin, seoMixin],

		components: {
			CoverOverlay,
			AuthTabsBlock: () => import('@/components/auth/AuthTabsBlock.vue'),		
			RemoteLoginBlock: () => import('@/components/auth/RemoteLoginBlock.vue'),		
			// CartItem: () => import('./CartItem.vue'),			
		},

		async fetch({store, route}) {
			await store.dispatch('seo/fetch_meta_tags', {
				params:	{redirect_uri: getSeoLink(route) }
			});

			if (store.state.categories.catalogData.length < 1) {
				// console.log(cookie_hash)
				await store.dispatch('categories/fetch_catalog_items', {
					params:	{ max: -1, withChildren:true }
				});
			}
		},

		data: () => ({
			isAgreedPersonalData: false,
			selectedWarehouse: null,

			timer: null,

			nova_poshtaForm: {
				novaposhta_city_id: null,
				novaposhta_first_name: '',
				novaposhta_middle_name: '',
				novaposhta_last_name: '',
				// novaposhta_warehouse_id: null
			},

			user_phone: '',

			formData: {
				delivery_type: null,
				payment_type: null,
				comment: '',
				// delivery_general_info: '',
				// amount_cash_delivery: '',				
			}
		}),

		computed: {
			...mapState({
				authUser: state => state.auth.authUser,
				authLoading: state => state.auth.isLoading,

				cartData: state => state.cart.itemData,
				isLoading: state => state.cart.isLoading,
				isSaving: state => state.cart.isSaving,

				citiesList: state => state.nova_poshta.citiesList,
				warehousesList: state => state.nova_poshta.warehousesList,
				citiesLoading: state => state.nova_poshta.citiesLoading,
				warehousesLoading: state => state.nova_poshta.warehousesLoading
			}),

			tabsList: (that) => [
				{ title: `${that.$t('phrase.regular_client')}`, prop: 'regularClientTabActive' },
				{ title: `${that.$t('phrase.new_client')}`, prop: 'newClientTabActive' },
			],

			DELIVERY_TYPES: () => DELIVERY_TYPES,
			deliveryTypesList: () => deliveryTypesList,
			PAYMENTS_TYPES: () => PAYMENTS_TYPES,
			paymentsTypesList: () => paymentsTypesList,
			getProdImgSrc: () => getProdImgSrc
		},

		methods: {
			...mapActions({
				set_cart: 'cart/set_cart',
				cart_checkout: 'cart/cart_checkout',
				sign_in: 'auth/sign_in',
				fetch_cities: 'nova_poshta/fetch_cities',
				fetch_warehouses: 'nova_poshta/fetch_warehouses',
			}),

			socialLoginSubmit(provider) {
				this.sign_in({ method:'GET', url: `/social-auth/${provider}` });
			},

			citiesQuery(query) {
				if (query && query.length > 1) {
					if (this.timer) {
						clearTimeout(this.timer);
					}
					this.timer = setTimeout(() => {
						this.timer = null;
						// console.log('send', query)
						this.fetchCities({ q: query });
					}, 500);
				}
			},

			fetchCities(filters) {
				const payload = { params: { ...filters } };
				this.fetch_cities(payload);
			},

			fetchWarehouses(id) {
				this.fetch_warehouses({ params: {max:-1, cityId: id || this.nova_poshtaForm.novaposhta_city_id } });
			},

			submit() {
				if (this.authUser /*&& this.isAgreedPersonalData*/) {
					let payload = {
						data: {	...this.formData }
					};

					if (this.formData.delivery_type === DELIVERY_TYPES.NOVA_POSHTA) {
						payload.data = {
							...payload.data,
							...this.nova_poshtaForm,
							novaposhta_warehouse_id: this.selectedWarehouse.id,
							novaposhta_phone_number: this.user_phone
						}
					}
					// console.log(payload)

					this.cart_checkout(payload).then(() => {
						this.$router.push(this.localePath('/success'));
					});
				}
			}

			
		},

		watch: {
			'formData.delivery_type'(type) {
				if (type === DELIVERY_TYPES.NOVA_POSHTA /*&& this.citiesList.length < 1*/) {
					// this.fetchCities();
					this.nova_poshtaForm.novaposhta_first_name = this.authUser.first_name;
					this.nova_poshtaForm.novaposhta_last_name = this.authUser.last_name;
				}
			},

			'nova_poshtaForm.novaposhta_city_id'(id) {			
				this.fetchWarehouses(id);
			}
		}
	}
	
</script>