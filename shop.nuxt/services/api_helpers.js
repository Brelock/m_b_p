import { Notification } from 'element-ui';
import { getObjectVal } from '@/helpers';

const combineHeaders = headers => {
	if (headers) return headers;

	return headers;
	// headers = {'Content-Type': 'multipart/form-data'}
};

const setHttpToken = ({token, axiosConfig, axios}) => {
	try {
		const config = axiosConfig || axios.defaults;
		if (token) {
	    config.headers.common['Authorization'] = `Bearer ${token}`;
		} else {
	    config.headers.common['Authorization'] = null;
		}
	} catch(e) {console.warn(e)}
	// console.log('2: ',axios.defaults.headers.common.Authorization)
};
const setCookieHash = ({cookie_hash, axiosConfig, axios}) => {
	try {
		const config = axiosConfig || axios.defaults;
		if (cookie_hash && cookie_hash != 'null') {
		// console.log('setCookieHash ', cookie_hash)
	    config.headers.common['cookie-hash'] = `${cookie_hash}`;
		} else {
	    config.headers.common['cookie-hash'] = null;
		}
	} catch(e) {console.warn(e)}
	// console.log('2: ',axios.defaults.headers.common.Authorization)
};

const prepareParams = getParams => {
	let result = {};
	for (let prop in getParams) {
		if (getParams[prop] || typeof getParams[prop] === 'boolean') {
			result[prop] = getParams[prop];
		}
	}

	return result;
};

const parsePayload = payloadData => {
	const result = {};
	// console.log(payloadData)
	if (payloadData) {
		const payload = { ...payloadData };

		// if (!isEmpty(payload)) {
		if (payload.params) result.params = prepareParams(payload.params);
		if (payload.data) result.data = payload.data;
		if (payload.url) result.mod_url = payload.url;
		if (payload.headers) result.headers = payload.headers;
		// }
	}
	return result;
};

const combineUrl = (initialUrl, params) => {
	let url = initialUrl;
	if (params) {
		// if (params.itemId) url = `${url}/${params.itemId}`;
		// const getParams = toUrl(params);
		const getParams = params;
		url = getParams ? `${url}?${getParams}` : url;
	}
	// console.log(url)
	return url;
};

const getParamsFromUrl = (url, paramName) => {
	const urlSplitted = url.split('?');
	let pathOnly = urlSplitted[0];
	let result = {
		pathOnly: pathOnly
	};

	if (urlSplitted && urlSplitted.length > 1) {
		const params = urlSplitted[urlSplitted.length - 1].split('&');
		for (let i = 0; i < params.length; i++) {
			let param = params[i];

			if (/#_=_/.test(param)) {
				param = param.replace('#_=_', '');		
			}

			const paramSplitted = param.split('=');
			result[ paramSplitted[0] ] = paramSplitted[1];
		}
	}

	/*if (param && window && window.location.hash && window.location.hash == '#_=_' ) {
		window.location.hash = '';
		param = param.replace(/#_=_/, '');
	}*/

	// console.log('url', urlSplitted[0])
	return result;
};


const isSuccessStatus = ({ status, data, config }) => {
	if (status >= 200 && status < 300) {
		// console.log(config);
		if (data && data.status) {
			return true;
		} else if (data || data != undefined) {
			return true;
		} else if (config && config.url == '/cart') {
			return true;
		}
	}
	return false;
};

const getResponseMessage = originalResponse => {
	let message = '';

	if (originalResponse) {
		const response = originalResponse.data ? originalResponse.data : originalResponse.response;

		if (response && response.data) {
			const { messages } = response.data;

			if (messages instanceof Array) {
				for (let i = 0; i < messages.length; i++) {
					for (let j = 0; j < messages[i].length; j++) {
						const comma = j === messages[i].length - 1 ? '.' : ', ';
						message += `${messages[i][j]}${comma}`;
					}
				}
			}
		}
	}

	return message;
};

const getResultMessage = (resultMessageData, itemData) => {
	let message = '';
	if (resultMessageData) {
		const { is_true, is_false, flag, text } = resultMessageData;
		if (text) {
			message = text;
		} else if (flag && itemData) {
			message = itemData[flag] ? is_true : is_false;
		}
	}

	return message;
};

const getResponseValue = (response, payload) => {
	let result;
	const { alternateResponseProp, prepareData } = payload;
	if (alternateResponseProp) {
		result = getObjectVal(response, payload.alternateResponseProp, {withoutDeep:true});
	} else {
		result = response.data.data;
	}
	if (prepareData) {
		result = prepareDataFunctions[prepareData](result);
	}
	return result;
};

const handleError = (error, { commit, customMessage, reject = null, loading, notify, loadingProp }) => {
	try {
		const message = getResponseMessage(error);

		if (error.response) {
			if (error.response.status === 401) {
				// commit('auth/AUTH_CLEAR', { root: true });

				// router.push('/');
				commit('SET_STATUS_LOADING', false);
				commit('SET_STATUS_SAVING', false);

				if (reject) reject(error);
				Notification.warning({
					title: `Ограничение`,
					message: message || 'Эта операция только для авторизированных пользователей'
				});
				return;
			}
		}
		// console.log(reject)
		if (reject) {
			reject(error);
		}
		if (loading) {
			if (loadingProp) {
				commit('SET_STATE', { stateProp: loadingProp, value: false });
			} else {
				commit('SET_STATUS_LOADING', false);
				commit('SET_STATUS_SAVING', false);
			}
		}
		if (notify) {
			Notification.error({ title: `Error`, message: customMessage || message || error.message, duration: 0 });
		}
	} catch (e) {
		console.log(e);
	}
};

const prepareDataFunctions = {
	prepareProductsList: products => {
		let itemsList = [];

		for (let i = 0; i < products.length; i++) {
			let item = { ...products[i] };
			item.category_name_ru = products[i].category.title_ru;
			item.category_name_uk = products[i].category.title_uk;
			delete item.category;
			
			itemsList.push(item);
		}
		return itemsList;
	},

	prepareFilterOptionsList: options => {
		let itemsList = [];

		for (let i = 0; i < options.length; i++) {
			const { id, title_ru, title_uk } = options[i];

			let item = { 
				id: id,
				title_ru: title_ru,
				title_uk: title_uk
			};
			
			itemsList.push(item);
		}
		return itemsList;
	},

	prepareCitiesList: cities => {
		// console.time('cityList')
		let itemsList = [];

		for (let i = 0; i < cities.length; i++) {
			const city = cities[i];
			let item = {
				id: city.id,
				description_ru: city.description_ru, 
				description_uk: city.description_uk,
			}
			itemsList.push(item);
		}
		// console.timeEnd('cityList')

		return itemsList;
	},
	/*setupCatalogItems: (categories, products) => {
		
		function getSubCat(parentCat, categoriesList) {
			
			let otherCategories = [];
			let parentCategories = [];

			for (let i = 0; i < categoriesList.length; i++) {
				if (!categoriesList[i].parent_id || categoriesList[i].parent_id === parentCat.id) {
					parentCategories.push(categoriesList[i]);
				} else {
					otherCategories.push(categoriesList[i]);	
				}
			}

			if (otherCategories.length && parentCategories.length) {
				for (let i = 0; i < parentCategories.length; i++) {
					const currentSubCats = getSubCat(parentCategories[i], otherCategories);
					if (currentSubCats && currentSubCats.length) {
						parentCategories[i].sub_categories = currentSubCats;
					}
				}
				return parentCategories;						
			} else {
				return parentCategories;
			}
		}

		return getSubCat(categories, categories);
	}*/
};

// const isPrevent = () => this.$store.state.auth.preventRequests;
const isPrevent = () => false;

const	initialAsyncFetch = (store, { actions, params, options = {} }) => {
	// console.log(store.dispatch('products/fetch_top_of_the_day'))
	for (let i = 1; i < actions.length; i++) {
		// store.dispatch(actions[i])({ params: params, ...options });				
		store.dispatch(actions[i]);
	}
};

export {
	combineHeaders,
	setHttpToken,
	setCookieHash,
	// toUrl,
	parsePayload,
	combineUrl,
	handleError,
	getResponseMessage,
	isSuccessStatus,
	isPrevent,
	getResultMessage,
	getResponseValue,
	prepareDataFunctions,
	initialAsyncFetch,
	getParamsFromUrl
};
