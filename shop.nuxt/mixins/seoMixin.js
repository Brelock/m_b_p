import { getSeoLink } from "@/helpers";
import isEmpty from 'lodash/isEmpty';

const seoMixin = {
	data() {
		return {

		};
	},

	computed: {
		seo_meta_tags() {
			return this.$store.state.seo.meta_tags;
		},
		meta () {
			const { instancePropName, seo_meta_tags, $i18n } = this;

			// console.log('seo mixin1', this[instancePropName])
			let hasMetaTags = false;

			if (seo_meta_tags instanceof Array && seo_meta_tags.length) { 
				hasMetaTags = true
			} else if (seo_meta_tags && !isEmpty(seo_meta_tags)) {
				hasMetaTags = true
			} 
			
			if (hasMetaTags) {
				return [
					{
						hid: seo_meta_tags[`title_${$i18n.locale}`],
						name: seo_meta_tags[`title_${$i18n.locale}`],
						content: seo_meta_tags[`description_${$i18n.locale}`]
					}
				]
			} else if (instancePropName && this[instancePropName]) {
				// console.log(this[instancePropName])
				// if (this[instancePropName].seo_title) {
					// return []
					return [
						{
							hid: this[instancePropName][`seo_title_${$i18n.locale}`] ||
									 this[instancePropName][`title_${$i18n.locale}`],
							name: this[instancePropName][`seo_title_${$i18n.locale}`] ||
										this[instancePropName][`title_${$i18n.locale}`],
							content: this[instancePropName][`seo_description_${$i18n.locale}`],
						},
					];
				// } else if (true) {}
			// console.log('seo mixin2', this[instancePropName])

				
			} else {
				return []
			}							
		},

		head_title() {
			// console.log('meta.length', this.meta.length)
			if (this.meta.length) {
				return this.meta[0].name
			} else
			return '';
		}
	},

	head () {
		const canonical = getSeoLink(this.$route);
		// console.log('seo mixin title', this.head_title, canonical)
		return {
			title: this.head_title,
			meta: [
				...this.meta
			],
			script: [
				// { src: 'https://markknol.github.io/console-log-viewer/console-log-viewer.js' }
			],
			link: [{ rel: 'canonical', href: canonical }]
		}
	},

	methods: {
		// https://zengi.zengineers.company/
		/*getLink() {
			// console.log(this.$route.path)
			// return `http://shop.loc:8089/${this.$route.path
			return `https://api.mirroz.co.il${this.$route.path				
				.toLowerCase()
				.replace(/\/$/, '')}`
		}*/
	},

	created() {
		/*const payload = {
			params: {redirect_uri: this.getLink() }
		}*/
		/*this.$store.dispatch('seo/fetch_meta_tags', payload)
			.then(response => {

				console.log('response: ', response)						
			});*/
	},

	/*beforeDestroy() {
		this.$store.dispatch('seo/set_meta_tags')
	}*/
};

export default seoMixin;
