<template>
	<div class="mainWrapper">
		<div class="contentWrapper relative">
			<client-only>
				<SimpleSpinner :active="authLoading" big />				
			</client-only>

			<Header />
			
			<transition name="component-fade" mode="out-in">
				<nuxt />
			</transition>
		</div>
		<Footer />

		<CoverOverlay :active="overlay.show" :z="overlay.zIndex" @onClick="overlayClick" />
	</div>
</template>

<script>
import { mapState/*, mapActions*/ } from 'vuex';
import CoverOverlay from '@/components/CoverOverlay';
import Cookies from 'universal-cookie';

	export default {
		// middleware: ['auth'],
		components: {
			CoverOverlay,
			Header: () => import('@/components/header/Header.vue'),
			Footer: () => import('@/components/Footer.vue'),
		},

		/*data: () => ({
			overlayOptions: {
				show: false,
				zIndex: 2600
			},
		}),*/

		/*serverPrefetch () {
			// console.log('ok')
			this.fetchCatalog();
		},*/

		computed: {
			...mapState({
				overlay: state => state.global.overlay,
				authLoading: state => state.auth.isLoading,
				// seo_meta_tags: state => state.seo.meta_tags_list,
			}),		

			/*catalogData() {
				return this.$store.state.categories.catalogData;
			}*/
		},

		methods: {
			overlayClick() {
				this.$store.dispatch('global/show_overlay', {	show: false });
			},
			/*fetchCatalog() {
				// console.log(this.$store.dispatch)
				console.log('fetch')
				this.$store.dispatch('categories/fetch_catalog_items', { params: {max: -1, withChildren:true} });
			}*/
		},

		/*created() {
			console.log('layout created')
			
		},*/

		mounted() {
			// console.log('layout mounted', this.$route)
			const cookies = new Cookies();
			// console.log('layout mounted redirectToCheckout', cookies.get('redirectToCheckout'))

			if ( cookies.get('redirectToCheckout') ) {
				cookies.remove('redirectToCheckout');				
				this.$router.push('/checkout');
			}
			

			// console.log(this.catalogData.length)
			/*if (!this.catalogData.length) {
				this.fetchCatalog();				
			}*/
		},

	}	
</script>

<style lang="scss">
	.fade-enter-active, .fade-leave-active {
		transition: opacity .2s ease-in;
	}
	.fade-enter, .fade-leave-to {
		opacity: 0;
	}

</style>

