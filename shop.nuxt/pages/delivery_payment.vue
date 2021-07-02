<template>
	<div class="page">

		<section class="pageSection">
			<div class="mcontainer">
				<div class="sectionHeader sectionBlock">
					<BreadCrumbs :items="crumbs" :i18n="$i18n" @localePath="localePath"/>

					<h2 class="page-title medium capitalize-first">{{ $t('menu.delivery_payment') }}</h2>
				</div>
			
				<div class="sectionBlock content-container whiteBlock medium">
					<div class="info-list">
						<div class="info-block-item">
							<div><b>Способы доставки:</b></div>
							<div>- Новая почта (наложный платеж или рпедоплата)</div>
							<div>- Укрпочта (наложный платеж или предоплата)</div>
							<div>- Justin (наложный платеж или предоплата)</div>
							<div>- Самовывоз (г. Запорожье, ул. Верхняя, 48)</div>
						</div>

						<div class="info-block-item">
							<div><b>Способы оплаты:</b></div>
							<div>- Visa</div>
							<div>- MasterСard</div>
							<div>- Наложный платеж</div>
							<div>- При личной встрече</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div> 
</template>

<script>
	import { breadcrumbsFromPathMixin, seoMixin } from '@/mixins';
	import { getSeoLink } from "@/helpers";

	export default {
		name: 'delivery_payment',
		mixins: [breadcrumbsFromPathMixin, seoMixin],

		computed: {
			instancePropName: () => 'seo_data',

			seo_data() {
				return {
					title_ru: this.$t('menu.delivery_payment'),
					title_he: this.$t('menu.delivery_payment'),
					seo_description_ru: this.$t('menu.delivery_payment'),
					seo_description_he: this.$t('menu.delivery_payment'),
				}
			},
		},

		async fetch({store, route}) {
			await store.dispatch('seo/fetch_meta_tags', {
				params:	{redirect_uri: getSeoLink(route) }
			});

			if (store.state.categories.catalogData.length < 1) {
				// console.log('fetch index')
				await store.dispatch('categories/fetch_catalog_items', {
					params:	{ max: -1, withChildren:true }
				});
			}
		}
	}
	
</script>