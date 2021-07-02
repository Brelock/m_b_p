// const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const imageminMozjpeg = require('imagemin-mozjpeg')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const isDev = process.env.NODE_ENV !== 'production';

module.exports = {
	mode: 'universal',
	...(!isDev && {
		modern: 'client'
	}),
	/*
	** Headers of the page
	*/
	head: {
		title: 'shop.nuxt',
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, initial-scale=1, shrink-to-fit=no' },
			{ hid: 'description', name: 'description', content: 'Интернет-магазин' },
			{ name: "msapplication-TileColor", content: "#ffffff"},
			{ name: "msapplication-TileImage", content: "/ms-icon-144x144.png"},
			{ name: "theme-color", content: "#ffffff"},
		],
		link: [
			// { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
			{ rel: 'apple-touch-icon', sizes: "57x57", href: "/apple-icon-57x57.png" },
			{ rel: 'apple-touch-icon', sizes: "60x60", href: "/apple-icon-60x60.png" },
			{ rel: 'apple-touch-icon', sizes: "72x72", href: "/apple-icon-72x72.png" },
			{ rel: 'apple-touch-icon', sizes: "76x76", href: "/apple-icon-76x76.png" },
			{ rel: 'apple-touch-icon', sizes: "114x114", href: "/apple-icon-114x114.png" },
			{ rel: 'apple-touch-icon', sizes: "120x120", href: "/apple-icon-120x120.png" },
			{ rel: 'apple-touch-icon', sizes: "144x144", href: "/apple-icon-144x144.png" },
			{ rel: 'apple-touch-icon', sizes: "152x152", href: "/apple-icon-152x152.png" },
			{ rel: 'apple-touch-icon', sizes: "180x180", href: "/apple-icon-180x180.png" },
			{ rel: 'icon', type: 'image/png', sizes: "192x192", href: "/android-icon-192x192.png" },
			{ rel: 'icon', type: 'image/png', sizes: "32x32", href: "/favicon-32x32.png" },
			{ rel: 'icon', type: 'image/png', sizes: "96x96", href: "/favicon-96x96.png" },
			{ rel: 'icon', type: 'image/png', sizes: "16x16", href: "/favicon-16x16.png" },
			{ rel: 'manifest', href: '/manifest.json' }
			// { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap&subset=cyrillic' }
		]
	},
	rootDir: __dirname,
	router: {
		prefetchLinks: false
	},
	/*
	** Customize the progress bar color
	*/
	loading: { color: '#3B8070' },

	/*
	** Global CSS
	*/
	css: [
		{ src: 'element-ui/lib/theme-chalk/icon.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/message-box.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/message.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/notification.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/input.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/input-number.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/select.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/checkbox.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/radio.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/collapse.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/pagination.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/slider.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/option.css', lang: 'css' },
		{ src: 'element-ui/lib/theme-chalk/dialog.css', lang: 'css' },	
		// { src: 'element-ui/lib/theme-chalk/form.css', lang: 'css' },	
		// { src: 'element-ui/lib/theme-chalk/form-item.css', lang: 'css' },	

		// { src: 'element-ui/lib/theme-chalk/index.css', lang: 'css' },
		// { src: 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css', lang: 'css' },
		// { src: '~assets/css/normalize.css', lang: 'css' },
		// { src: '~assets/scss_base/main.scss', lang: 'sass' },
		{ src: '~assets/css/main.min.css', lang: 'css' },
		{ src: '~assets/scss/main.scss', lang: 'sass' }
	],

	/* 
	** Modules
	*/
	/*chainWebpack: config => {
    config.module.rules.delete("svg");
  },*/
  
	modules: [
		// Doc: https://bootstrap-vue.js.org
		// 'bootstrap-vue/nuxt',
		'@nuxtjs/axios',
		'cookie-universal-nuxt',  // ['cookie-universal-nuxt', { alias: 'cookiz' }],
		'nuxt-trailingslash-module',
		'nuxt-webfontloader',
		'nuxt-svg-loader',

		['nuxt-i18n', {
			baseUrl: 'http://shop.loc:8089',
			lazy: true,
			seo: true,
			locales: [
				{
					name: 'Russian',
					name_ru: 'Русский',
					name_uk: 'Рос*йська',
					code: 'ru',
					iso: 'ru-RU',
					file: 'ru-RU.js'
				},
				{
					name: 'Ukrainian',
					name_ru: 'Украинский',
					name_uk: 'Укра*нська',
					code: 'uk',
					iso: 'uk-UK',
					file: 'uk-UK.js'
				}
			],
			langDir: 'lang/',
			defaultLocale: 'ru',
			// strategy: 'no_prefix',
			vueI18n: {
				fallbackLocale: 'ru',
				messages: {
					ru: {
						welcome: 'Welcome'
					},
					uk: {
						welcome: 'Bienvenue'
					},
				}
			}
		}],
		// 'nuxt-stripe-module',
	],

	// axios: {
	//   // baseURL: 'http://localhost:4000', // Used as fallback if no runtime config is provided
	//   debug: false,
	// 	proxyHeadersIgnore: ['host', 'cf-ray', 'cf-connecting-ip'],
	//   headers: {
	//   	common: {
	//   		'Accept': 'application/json, text/plain, */*, cookie-hash'
	//   	},

	//   }
	// },

	webfontloader: {
		events: false,
		google: {
			families: ['Montserrat:400,500,600,700:cyrillic&display=swap']
		},
		timeout: 5000
	},

	render: {
		// http2: {
		//     push: true,
		//     pushAssets: (req, res, publicPath, preloadFiles) => preloadFiles
		//     .map(f => `<${publicPath}${f.file}>; rel=preload; as=${f.asType}`)
		//   },
		// compressor: false,
		resourceHints: false,
		// etag: false,
		/*static: {
			etag: false
		}*/
	},

	/*
	** Plugins
	*/
	plugins: [
		// new BundleAnalyzerPlugin(),
		'~/plugins/axios',
		{ src: '@/plugins/element-ui' },
		{ src: '@/plugins/simple-spinner' },
		{ src: '@/plugins/lazy-image' },
		{ src: '@/plugins/breadcrumbs' },
		// { src: '@/plugins/slick', mode: 'client' },
		// { src: '@/plugins/vue-lazy-load.js' }
		// '@/plugins/vue2-perfect-scrollbar',
		// '~/plugins/pluralization',
		// '~/plugins/setHeaderText',
		// '@/plugins/globalMethods'
	],

	/*
	** Build configuration
	*/
	build: {
		/*
		** Run ESLint on save
		*/
		analyze: true,


		extend(config, { isDev, isClient }) {
			if (isDev && isClient) {
				config.module.rules.push({
					enforce: 'pre',
					test: /\.(js|vue)$/,
					loader: 'eslint-loader',
					exclude: /(node_modules)/
				})
			}
		},

		optimizeCss: false,
		filenames: {
			app: ({ isDev }) => isDev ? '[name].js' : 'js/[contenthash].js',
			chunk: ({ isDev }) => isDev ? '[name].js' : 'js/[contenthash].js',
			css: ({ isDev }) => isDev ? '[name].css' : 'css/[contenthash].css',
			img: ({ isDev }) => isDev ? '[path][name].[ext]' : 'img/[contenthash:7].[ext]',
			font: ({ isDev }) => isDev ? '[path][name].[ext]' : 'fonts/[contenthash:7].[ext]',
			video: ({ isDev }) => isDev ? '[path][name].[ext]' : 'videos/[contenthash:7].[ext]'
		},
		...(!isDev && {
			html: {
				minify: {
					collapseBooleanAttributes: true,
					decodeEntities: true,
					minifyCSS: true,
					minifyJS: true,
					processConditionalComments: true,
					removeEmptyAttributes: true,
					removeRedundantAttributes: true,
					trimCustomFragments: true,
					useShortDoctype: true
				}
			}
		}),
		splitChunks: {
			layouts: true,
			pages: true,
			commons: true
		},
		optimization: {
			minimize: !isDev
		},
		...(!isDev && {
			extractCSS: {
				ignoreOrder: true
			}
		}),
		transpile: ['vue-lazy-hydration', 'intersection-observer'],
		postcss: {
			plugins: {
				...(!isDev && {
					cssnano: {
						preset: ['advanced', {
							autoprefixer: false,
							cssDeclarationSorter: false,
							zindex: false,
							discardComments: {
								removeAll: true
							}
						}]
					}
				})
			},
			...(!isDev && {
				preset: {
					browsers: 'cover 99.5%',
					autoprefixer: true
				}
			}),

			order: 'cssnanoLast'
		},
		extend(config, ctx) {
			const ORIGINAL_TEST = '/\\.(png|jpe?g|gif|svg|webp)$/i'
			const vueSvgLoader = [
				{
					loader: 'vue-svg-loader',
					options: {
						svgo: false
					}
				}
			]
			const imageMinPlugin = new ImageminPlugin({
				pngquant: {
					quality: '5-30',
					speed: 7,
					strip: true
				},
				jpegtran: {
					progressive: true

				},
				gifsicle: {
					interlaced: true
				},
				plugins: [
					imageminMozjpeg({
						quality: 70,
						progressive: true
					})

				]
			})
			if (!ctx.isDev) config.plugins.push(imageMinPlugin)

			config.module.rules.forEach(rule => {
				if (rule.test.toString() === ORIGINAL_TEST) {
					rule.test = /\.(png|jpe?g|gif|webp)$/i
					rule.use = [
						{
							loader: 'url-loader',
							options: {
								limit: 1000,
								name: ctx.isDev ? '[path][name].[ext]' : 'img/[contenthash:7].[ext]'
							}
						}
					]
				}
			})
			//  Create the custom SVG rule
			/*const svgRule = {
				test: /\.svg$/,
				oneOf: [
					{
						resourceQuery: /inline/,
						use: vueSvgLoader
					},
					{
						resourceQuery: /data/,
						loader: 'url-loader'
					},
					{
						resourceQuery: /raw/,
						loader: 'raw-loader'
					},
					{
						loader: 'file-loader' // By default, always use file-loader
					}
				]
			}

			config.module.rules.push(svgRule) */// Actually add the rule
		}

	}
}

