<template>
	<!-- <client-only> -->
		<!-- <div class="product-item card-item"> -->
			<div class="item-container relative">

				<div v-if="additional_title" 
					class="additional-title absolute bold capitalize-first" 
					v-text="additional_title"
				></div>
		
				<div class="action-block hit absolute"
					v-if="!withoutAction && productItem.is_hit"
				>
					<span class="uppercase">{{ $i18n.t('temporary.hit') }}</span>
				</div>

				<div class="action-block new absolute"
					v-if="!withoutAction && productItem.is_new"
				>
					<span class="uppercase">{{ $i18n.t('temporary.new') }}</span>
				</div>

				<div class="action-block discount absolute"
					v-if="!withoutAction && productItem.discount"
				>
					<!-- <span class="uppercase">-{{productItem.discount.value}}  -->
					<span>- {{getPrice(productItem.price - productItem.new_price, 1)}}</span>

					<!-- <span class="1uppercase">{{ $i18n.t('temporary.new') }}</span> -->
				</div>
		
				<!-- <div class="like-block absolute">
					<button class="" type="button"
						@click="handleEvent('toggle_favorited', {itemId:productItem.id})">
						<i :class="['icomoon icon-heart', {'active': productItem.is_favorited}]" />
					</button>
				</div> -->
		
				<div class="image-block relative">
					<nuxt-link :to="localePath({	
						name:'catalog',
						params: { 'catalog': `p_${productItem.alias}` } 
					})" class="overlay-link absolute stretch"></nuxt-link>
					
					<LazyImage
						@onInit="d => handleEvent('lazyImgInit', d)"
						@onReady="d => handleEvent('lazyImgReady', d)"
						:src="getProdImgSrc(productItem.pictures[0], productItem.id, 
							/*'picture_thumb_file_name'*/)"
					/>
				</div>
				
				<div class="content-container">
					<div class="product-category card-add-info" v-text="productItem.category_name_ru"></div>
					<h4 class="product-title card-title">
						<nuxt-link :to="localePath({	
							name:'catalog',
							params: { 'catalog': `p_${productItem.alias}` } 
						})" v-text="productItem[`title_${$i18n.locale}`]"/>
						<!-- <a href="#">{{productItem.name}}</a> -->
					</h4>
		
					<div class="ratingBlock flex center spaceBetween">
						<ul class="rating-list"
							v-html="buildRating(+productItem.ratingReviewsAvg)">
						</ul>
		
						<!-- <div class="comments-block">
							<a href="#" class="">
								<i class="icomoon icon-chat"/>
								<span v-show="productItem.comments.length"
									class="medium" v-text="productItem.comments.length"/>
							</a>
						</div> -->
					</div>
		
					<div class="footer-block flex center spaceBetween">
						<div class="price bold">
							<div class="oldPrice" v-if="productItem.new_price">
								<span v-text="`${productItem.price}грн.`"/>
								<!-- <span class="currency"  v-text="' '+productItem.currency_name"/> -->
							</div>
							<!-- <div v-if="productItem.new_price"class="difference">
								-{{Math.ceil(productItem.price - productItem.new_price) }}грн.</div> -->

							<span class="final"
								v-text="getPrice(productItem.new_price || productItem.price, 1)"
							>
							</span>
							<!-- <span class="currency"  v-text="' '+productItem.currency_name"/> -->
						</div>

						<nuxt-link :to="localePath({	
							name:'catalog',
							params: { 'catalog': `p_${productItem.alias}` } 
						})"
							v-text="$i18n.t('common.buy')" class="standardButton primary uppercase"/>
		
						<!-- <button type="button"
							:class="['standardButton',
								{'primary uppercase': !productItem.in_cart},
								{'primary-inverted js_in_cart': productItem.in_cart}			
							]"
							
							@click="handleEvent('toggle_cart', {itemId:productItem.id})">
							{{productItem.in_cart ? 'в корзине' : 'купить'}}
						</button> -->
						<!-- <span v-show="productItem.in_cart" class="standardButton primary-inverted">в корзине</span> -->
					</div>
				</div>
			</div>
		<!-- </div> -->
	<!-- </client-only> -->
</template>

<script>
import { createActionBlock, getProdImgSrc, buildRating, getPrice } from '@/helpers';

export default {
	// functional: true,
	props: {
		// filters: Object,
		withoutAction: Boolean,
		additional_title: {type: String, default: ''},
		productItem: {
			type: Object,
			default: () => ({})
		},
	},

	computed: {
		getProdImgSrc: () => getProdImgSrc,
		buildRating: () => buildRating,
		getPrice: () => getPrice,
		createActionBlock: () => createActionBlock,
	},

	methods: {
		handleEvent(eventName, data) {
			this.$emit("event", eventName, data);
		},
	}
};
</script>