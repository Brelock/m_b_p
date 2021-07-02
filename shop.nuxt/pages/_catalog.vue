<template>
	<div class="page relative">
	<!-- :class="[
		{'categoryPage': pageType.alias === 'categories'},
		{'categoryPage': pageType.alias === 'products'}
	]"> -->
		<!-- {{ toConsole(pageType.alias) }} -->
		<transition name="component-fade" mode="out-in">
			<section class="pageSection view-content" v-if="contentReady && pageType.alias == 'categories'" key="CategoryPage">
				<CategoryPage	
					:containerName="containerName"
				/>
			</section>
		<!-- </transition> -->

		<!-- <transition name="component-fade" mode="out-in"> -->
			<section class="pageSection view-content" v-else-if="contentReady && pageType.alias == 'products'" key="ProductPage">
				<ProductPage 
					:containerName="containerName"
				/>
			</section>

			<div class="pageSection view-content" v-else></div>
		</transition>		

		<!-- <SubscribeSection/> -->

		<ServicesSection :i18n="$i18n"/>
	</div>
</template>

<script>
	import { mapState/*, mapActions*/ } from 'vuex';	
	import { seoMixin } from '@/mixins';

	import { getPageType, getSeoLink, getAlias } from '@/helpers';

	export default {
		name: 'catalog',
		mixins: [seoMixin],
		components: {
			CategoryPage: () => import('@/components/categories/CategoryPage.vue'),
			ProductPage: () => import('@/components/products/ProductPage.vue'),
			SubscribeSection: () => import('@/components/SubscribeSection.vue'),
			ServicesSection: () => import('@/components/ServicesSection.vue')			
		},

		validate({params, store}) {
			let pageType = getPageType(params, 'catalog');
			if (pageType) {
				// console.log('validate: ', params, pageType.alias)				
				store.dispatch('global/set_page_type', pageType);
			}

			return !!pageType;
		},

		async fetch({store, route, methods}) {
			// console.log('async fetch')

			await store.dispatch('seo/fetch_meta_tags', {
				params:	{redirect_uri: getSeoLink(route) }
			})

			if (store.state.categories.catalogData.length < 1) {
				// console.log('fetch index')
				await store.dispatch('categories/fetch_catalog_items', {
					params:	{ max: -1, withChildren:true }
				});
			}

			const alias = getAlias( route.params['catalog'] );
			
			if (alias) {
				const payload = { itemAlias: alias, notNotifyError: true };

				function fetch_prices_and_products(categoryId) {
					const payload = {	params: {categoryId: categoryId } };
					
					return new Promise((resolve, reject) => {
						store.dispatch('products/fetch_prices', payload).then(data => {
							// this.setFilters(priceFilters)
							const priceFilters = {
								minPrice: data.min,
								maxPrice: data.max
							};
							let accessCount = 0;
							const newFilters = {...store.state.products.filters, ...priceFilters};

							store.dispatch('products/set_filters', newFilters)

							fetch_products(categoryId, newFilters).then(() => {
								/*store.dispatch('products/set_state', {
									stateProp: 'fetched_on_ssr',
									value: true,
								})*/
								// console.log(store.state.products.filters, store.state.products.itemsList.length)
								resolve();
							});
							// resolve();
							

							
							// console.log('1', data);
							// resolve();

							/*.catch((e)=> {
								reject(e);
							});*/
						})
						// .catch(e => console.log(e))
					})
				}

				async function fetch_products(categoryId, filters) {
					const payload = { params: { categoryId: categoryId, ...filters } };					
					await store.dispatch('products/fetch_products', payload)
				}

				async function fetch_category_filters(categoryId) {
					const payload = { params: { max: -1, categoryId: categoryId } };					
					await store.dispatch('filters/fetch_category_filters', payload)
				}

				async function fetch_filter_options(categoryId) {
					const payload = { params: { max: -1 } };					
					await store.dispatch('filters/fetch_filter_options', payload)
				}

				function fetch_category(payload) {
					return new Promise((resolve, reject) => {
						store.dispatch('categories/fetch_category', payload).then(category => {
						// console.log('category', category);
							if (category && category.children.length < 1) {
								
								let accessCount = 0;

								const checkResponseCount = (accessCount) => {
									// console.log(accessCount)
									if (accessCount === 3) {
										store.dispatch('global/set_catalog_content_ready', true);
										resolve();
									}
								}

								fetch_category_filters(category.id).then(() => {
									accessCount++;
									checkResponseCount(accessCount);
								}).catch(e => {
									console.warn(e)
									reject();
								});
								fetch_filter_options(category.id).then(() => {
									accessCount++;
									checkResponseCount(accessCount);
								}).catch(e => {
									console.warn(e)
									reject();
								});

								fetch_prices_and_products(category.id).then(() => {
									accessCount++;
									checkResponseCount(accessCount);
								}).catch(e => {
									console.warn(e)
									reject();
								});

							} else {
								store.dispatch('global/set_catalog_content_ready', true);
								resolve();
							}

						}).catch(error => {
							console.warn(error)
							reject();
						})
					})
				}

				if (store.state.global.page_type.alias == 'categories') {
					store.dispatch('global/set_catalog_content_ready', false);
					await fetch_category(payload);

				} else if (store.state.global.page_type.alias == 'products') {
					store.dispatch('global/set_catalog_content_ready', false);

					await store.dispatch('products/fetch_product', payload).then((product) => {
						// console.log('ok', data)
						const filters = { max: 10, page: 1 };
						const payload = { 
							params: { ...filters, productId: product.id },
							notLoading: true
						};
						store.dispatch('global/set_catalog_content_ready', true);
						store.dispatch('reviews/fetch_published_reviews', payload);
					});
				}				
			}
		},

		computed: {
			...mapState({
				categoryItem: state => state.categories.itemData,
				productItem: state => state.products.itemData,
				pageType: state => state.global.page_type,
				contentReady: state => state.global.catalog_contentReady,
			}),
			containerName: () => 'catalog',

			instancePropName() {
				if (this.$store.state.global.page_type.alias == 'categories') {
					return 'categoryItem';
				} else if (this.$store.state.global.page_type.alias == 'products') {
					return 'productItem';
				}
			}

		}
	}	
</script>