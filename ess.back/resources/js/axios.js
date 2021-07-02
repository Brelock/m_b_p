glob.axios = require('axios');

axios = require('axios');
// console.log(process.env.NODE_ENV)
axios.defaults.baseURL = process.env.NODE_ENV === 'development'	?
												// 'http://ess.loc:8089'
												'http://ess.loc'
											:	'https://energosave.pro';

axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json;charset=UTF-8';
// axios.defaults.headers.common['Content-Type'] = 'multipart/form-data';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';