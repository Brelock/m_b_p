<template>
	<div class="categoriesPage">
		<section class="pageSection no-padding">
			<div class="mcontainer">
				<div class="sectionHeader">
					<BreadCrumbs
						:items="breadcrumbs"
						:i18n="$i18n"
						@localePath="localePath"
					/>

					<h1
						class="page-title"
						v-text="category[`title_${$i18n.locale}`]"
					></h1>
				</div>
			</div>
		</section>

		<section class="pageSection">
			<div class="mcontainer">
				<div class="mrow">
					<div class="content-container">
						<div class="flex wrap mrow">
							<div
								class="card-item category-item shadowedCard top-animation-hover mcol-xs-12 mcol-sm-4 mcol-md-3 mcol-lg-20"
								v-for="item in category.children"
								:key="`category-${item.id}`"
							>
								<div class="item-container">
									<div class="image-block relative">
										<nuxt-link
											:to="
												localePath({
													name: 'catalog',
													params: { catalog: `c_${item.alias}` },
												})
											"
											class="overlay-link absolute stretch"
										/>

										<LazyImage
											inline
											@onInit="lazyImgInit"
											@onReady="lazyImgReady"
											:src="item.picture_file_name"
										/>
									</div>

									<div class="content-container">
										<h4 class="title card-title ellipsis">
											<nuxt-link
												:to="
													localePath({
														name: 'catalog',
														params: { catalog: `c_${item.alias}` },
													})
												"
												>{{ item[`title_${$i18n.locale}`] }}</nuxt-link
											>
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
import { getProdImgSrc } from "@/helpers";
import {
	eventHandler,
	breadcrumbsMixin,
	lazyLoadMixin,
} from "@/mixins";

export default {
	name: "CategoriesPage",
	mixins: [eventHandler, breadcrumbsMixin, lazyLoadMixin],
	/*components: {
			// ProductsSlider: () => import('@/components/products/ProductsSlider.vue'),
			// SubscribeSection: () => import('@/components/SubscribeSection.vue'),
		},*/

	props: {
		category: {
			type: Object,
			required: true,
		},
		// itemsList: Array,
	},

	computed: {
		instancePropName: () => 'category',
		getProdImgSrc: () => getProdImgSrc,
	},

	methods: {
		getBGImg(fileName) {
			let url = fileName || require("@/assets/img/mock_img.jpg");
			return { "background-image": `url(${url})` };
		},

		handleEvent(eventName, data) {
			this.$emit("event", eventName, data);
		},
	},

	beforeMount() {
		// console.log('container: ', this.$route);
	},
};
</script>