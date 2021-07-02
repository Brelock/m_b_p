// import isEmpty from 'lodash.isempty';
import axios from '@/api/axiosService';
// import { Notification } from 'element-ui';
// import { getObjectVal, cleanDateString } from '@/helpers';

const getYmdDateString = ({ dateObj, ms }) => {
	const date = dateObj || new Date(ms);
	let y = date.getFullYear();
	let m = date.getMonth() + 1;
	let d = date.getDate();

	m = m < 10 ? `0${m}` : m;
	d = d < 10 ? `0${d}` : d;
	return `${y}-${m}-${d}`;
};

// -------------------

const combineHeaders = headers => {
	if (headers) return headers;

	return headers;
	// headers = {'Content-Type': 'multipart/form-data'}
};

const setHttpToken = token => {
	if (token) {
		axios.defaults.headers.common.Authorization = `Bearer ${token}`;
	} else {
		axios.defaults.headers.common.Authorization = null;
	}

	// console.log('2: ',axios.defaults.headers.common.Authorization)
};

const checkAuthorizationHeaders = () => {
	// console.log('1: ', axios.defaults.headers.common.Authorization)
	if (!!axios.defaults.headers.common && !!axios.defaults.headers.common.Authorization) {
		// empty
	} else {
		const token = localStorage.getItem('access_token');
		// const token = store.state.auth.access_token;
		setHttpToken(token);
	}
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

const setupMultipartFormData = (obj, form, namespace) => {
	try {
		let fd = form || new FormData();
		let formKey;
		// debugger;

		for (let property in obj) {
			if (obj[property]) {
				if (namespace) {
					formKey = namespace + '[' + property + ']';
				} else {
					formKey = property;
				}
				// console.log(formKey)
				// if the property is an object, but not a File, use recursivity.
				if (typeof obj[property] === 'object' && !(obj[property] instanceof File)) {
					setupMultipartFormData(obj[property], fd, formKey);
				} else {
					// if it's a string or a File object
					fd.append(formKey, obj[property]);
				}
			}
		}

		return fd;
	} catch (e) {
		console.warn(e);
	}
};

const parsePayload = (payloadData, method) => {
	const result = {};
	if (payloadData) {
		const payload = { ...payloadData };

		let newData = null;
		let newMethod = null;

		if (payload.withFile) {
			newData = setupMultipartFormData(payload.data);

			if (method == 'PUT') {
				newData.set('_method', 'PUT');
			}

			newMethod = newData && newData.has('_method') ? 'POST' : method;

			payload.headers = { 'Content-Type': 'multipart/form-data' };
			// console.log(newData.get('brand'))
			// console.log(newData.get('title_ru'))
		}

		// if (!isEmpty(payload)) {
		if (payload.params) result.params = prepareParams(payload.params);
		if (payload.data) result.data = newData || payload.data;
		if (payload.url) result.mod_url = payload.url;
		if (payload.headers) result.headers = payload.headers;
		result.newMethod = newMethod || method;
		// }
	}
	return result;
};

// ------------------------

const isSuccessStatus = ({ status, data }) => {
	if (status >= 200 && status < 300) {
		if (data && data.data) {
			return true;
		} else if (data && data.status) {
			return true;
		} else if (data && data.id) {
			return true;
		}
	}
	return false;
};

// --------------------------

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

const handleError = (error, { commit, customMessage, reject = null, loading, notify, loadingProp }) => {
	try {
		const message = getResponseMessage(error);

		if (error.response) {
			if (error.response.status === 401) {
				// store.dispatch('auth/clear_auth', { root: true });
				// router.push('/login');

				if (reject) reject(error);
				/*Notification.warning({
					title: `Not authorized`,
					message: message || 'Try sign in again'
				});*/
				return;
			}
		}
		// console.log(reject)
		if (reject) {
			reject(error);
		}
		if (notify) {
			// Notification.error({ title: `Error`, message: customMessage || message || error.message, duration: 0 });
		}
	} catch (e) {
		console.log(e);
	}
};


export {
	getYmdDateString,
	combineHeaders,
	setHttpToken,
	checkAuthorizationHeaders,
	prepareParams,
	setupMultipartFormData,
	parsePayload,
	isSuccessStatus,
	getResponseMessage,
	getResultMessage,
	handleError,
};
