// import { getPageType /*, getParentPageRoute*/ } from '@/helpers';
// import { Notification } from 'element-ui';

const layoutContainerMixin = {
	
	data: () => ({
		contentReady: true,
	}),

	computed: {
		pageType() {
			return this.$store.state.global.page_type;
		},
	},

	methods: {
		
	},

	watch: {
		pageType(type, oldType) {
			// console.log('watch', type, oldType)
			if (type != oldType) {
				this.contentReady = false;
			}

			setTimeout(() => {
				this.contentReady = true;
			}, 0);

		}
	},


	created() {
		// this.setup_navbar(this.navbarSettings);
	},

	beforeMount() {
	
	},

};

export default layoutContainerMixin;
