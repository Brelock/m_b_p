const lang = {
	data: () => ({
    lang: 'ua'
	}),

	methods: {
		setLang() {
			this.lang = $('html').attr('lang');
		}
	}
}

export default lang;