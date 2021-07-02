import axios from 'axios';

axios.defaults.headers['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.Accept = 'application/json';
axios.defaults.headers['Content-Type'] = 'application/json;charset=UTF-8';
axios.defaults.baseURL =
	process.env.NODE_ENV === 'development'
		? 'http://euro.loc:8089/api'
		: // 'https://api.drivesmatrix.assetmatrix.com/api'
		  'https://euro.com/api';

export default axios;
