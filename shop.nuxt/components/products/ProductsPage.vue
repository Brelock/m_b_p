<template>
	<div id="productsListPage" class="productsListPage productsListCategory">
		<section class="pageSection no-padding">
			<div class="mcontainer">
				<div class="sectionHeader">
					<BreadCrumbs :items="breadcrumbs.length ? breadcrumbs : crumbs" :i18n="$i18n" @localePath="localePath" />

					<h1
						class="page-title medium"
						v-text="title || category[`title_${$i18n.locale}`]"
					></h1>
				</div>
			</div>
		</section>

		<section class="pageSection">
			<div class="mcontainer">
				<div class="flex wrap">
					<aside class="sidebar categories-filter mcol-xs-12 mcol-md-3">
						<!-- @setFilters="setFilters"
							@setFilterOptionIds="setFilterOptionIds" -->
						<ProductsFilters
							@event="handleEvent"
							:openItemsList="initialOpenItemsList || openItemList"
							:filters="filters"
							:categoryFiltersList="categoryFiltersList"
							:activeFiltersList="activeFiltersList"
							:categoryFiltersLoading="categoryFiltersLoading"
							:brandsList="[]"
							:hideCategoryFilters="withoutCategoryFilters"
						/>
							<!-- :min_max_prices="min_max_prices" -->
					</aside>

					<div class="content-container mcol-xs-12 mcol-md-9">
						<client-only>
							<SortBar
								@onSort="handleSort"
								:optionsList="sortBarOptionsList"
								:filters="filters"
							/>
						</client-only>

						<div class="contentRow relative" v-if="itemsList.length">
							<client-only>
								<SimpleSpinner :active="itemsLoading" big />
							</client-only>
							<!-- {{toConsole('ok')}} -->
							<div class="flex wrap main-list">
								<div
									class="mcol-xs-12 mcol-sm-4 product-item card-item"
									v-for="item in itemsList"
									:key="`prod_card-${item.id}`"
								>
									<!-- {{toConsole(item.id)}} -->
									<ProductCard
										@event="handleEvent"
										:productItem="item"
									/>
								</div>
							</div>
						</div>

						<div
							class="preload-caption contentRow relative"
							v-show="itemsLoading && !itemsList.length"
						>
							<client-only>
								<SimpleSpinner :active="true" big />
							</client-only>
						</div>

						<div
							class="preload-caption contentRow"
							v-show="!itemsLoading && !itemsList.length"
						>
							{{ $t('phrase.no_products') }}...
						</div>

						<client-only>
							<div class="pagination-wrapper contentRow"
								v-if="itemsMeta && itemsMeta.last_page > 1 && itemsList.length">
								<PaginationContainer
									@setFilters="setFilters"
									:itemsName="{ mult: $t('common.products') }"
									:filters="filters"
									:meta="itemsMeta"
								/>
							</div>
						</client-only>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
import Vue from 'vue';
import { mapState, mapActions } from 'vuex';

import PriceSlider from '@/components/products/PriceSlider.vue';
Vue.component('PriceSlider', PriceSlider);

import {
	eventHandler,
	itemsFetchSetMixin,
	itemsFilterMixin,
	breadcrumbsMixin,
	breadcrumbsFromPathMixin,
	seoMixin,
	lazyLoadMixin
} from '@/mixins';

export default {
	name: 'products',

	mixins: [
		eventHandler,
		itemsFetchSetMixin,
		itemsFilterMixin,
		breadcrumbsMixin,
		breadcrumbsFromPathMixin,
		seoMixin,
		lazyLoadMixin
	],
	components: {
		ProductCard: () => import('@/components/products/ProductCard.vue'),
		ProductsFilters: () => import('@/components/products/ProductsFilters.vue'),
		SortBar: () => import('@/components/SortBar.vue'),
		PaginationContainer: () => import('@/components/PaginationContainer.vue')

		// ProductsSlider: () => import('@/components/ProductsSlider.vue'),
	},

	props: {
		category: {
			type: Object,
			default: null
			// required: true
		},
		title: String,
		withoutCategoryFilters: Boolean,
		isNewProducts: Boolean,
		initialOpenItemsList: {
			type: Array,
			default: null
		},
	},

	computed: {
		...mapState({
			itemsList: (state) => state.products.itemsList,
			itemsLoading: (state) => state.products.isLoading,
			// brandsList: state => state.brands.itemsList,
			// brandsLoading: state => state.brands.isLoading,
			// min_max_prices: (state) => state.products.prices,
			filters: (state) => state.products.filters,
			itemsMeta: (state) => state.products.fetchedMeta,

			categoryFiltersList: (state) => state.filters.itemsList,
			filterOptionsList: (state) => state.filters.filterOptionsList,
			categoryFiltersLoading: (state) => state.filters.isLoading
		}),

		meta() {
			if (this.seo_meta_tags) {
				return [
					{
						hid: this.seo_meta_tags[`title_${this.$i18n.locale}`],
						name: this.seo_meta_tags[`title_${this.$i18n.locale}`],
						content: this.seo_meta_tags[`description_${this.$i18n.locale}`]
					}
				];
			} else if (this.category) {
				return [
					{
						hid: this.category[`seo_title_${this.$i18n.locale}`],
						name: this.category[`seo_title_${this.$i18n.locale}`],
						content: this.category[`seo_description_${this.$i18n.locale}`]
					}
				];
			}

			return [];
		},

		sortBarOptionsList() {
			return [
				{ prop: `title_${this.$i18n.locale}`, label: this.$t('form.by_title') },
				{ prop: 'price', label: this.$t('form.by_price') }
			];
		},

		openItemList() {
			const { categoryFiltersList} = this;
			let list = [];

			if (categoryFiltersList.length) {
				list = categoryFiltersList.map((fi) => `category_filter-${fi.id}`);
			}
			list.push('price');
			return list;
		}
	},

	methods: {
		...mapActions({
			// toggle_favorited: 'products/toggle_favorited',
			fetch_items: 'products/fetch_products',
			set_items: 'products/set_products',
			fetch_prices: 'products/fetch_prices',

			fetch_brands: 'brands/fetch_brands',
			set_brands: 'brands/set_brands',

			set_filters: 'products/set_filters',
			fetch_category_filters: 'filters/fetch_category_filters',
			set_category_filters: 'filters/set_category_filters',
			fetch_filter_options: 'filters/fetch_filter_options',
			set_filter_options: 'filters/set_filter_options'
		}),

		// toConsole: (v) => console.log(v),

		fetchItems(filters) {
			// console.log('fetchItems')
			// const newFilters = filters || this.filters;
			const categoryId = this.category ? this.category.id : null;
			const payload = { params: { categoryId: categoryId, ...filters } };

			// return new Promise((resolve, reject) => {
				this.fetch_items(payload);

			// });
		}
	},

	watch: {
		itemsList(list) {
			setTimeout(() => {				
				this.checkLazyBlocks();				
			}, 200);
		}
	},

	beforeMount() {
		// console.log('created', this.itemsList)
		if (!this.itemsList.length) {
			this.fetchItems(this.filters)
			// const prodParams = { categoryId: this.categoryId };
			if (this.filters.minPrice == 0) {
				let params;
				if (this.isNewProducts) {
					params = { hasNew: 1 };
				} else if (this.category) {
					params = { categoryId: this.category.id, max: -1 };
				}

				if (params) {
					this.fetch_prices({
						params: { params }
					}).then( data => {
						const priceFilters = {
							minPrice: data.min,
							maxPrice: data.max
						};

						this.setFilters(priceFilters);
						// console.log('created', data)
						const actions = ['', 'fetch_brands', 'fetch_filter_options'];
						// this.doResponses({ actions: actions, params: { max: -1 } });

						if (this.category) {
							this.fetch_category_filters({
								params: { max: -1, categoryId: this.category.id }
							});
						}
					});
				}			
			}			
		}
	},

	beforeDestroy() {
		this.cleanLists([
			'set_items',
			'set_brands',
			'set_category_filters',
			'set_filter_options'
		]);
	}
};
</script>