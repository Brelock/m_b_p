import { combineHeaders, checkAuthorizationHeaders, parsePayload /*, combineUrl*/ } from '../helpers/api_helpers';

import axios from './axiosService';

const api = (method, url, payload) => {
	const { headers, data, params, newMethod } = parsePayload(payload, method);
	checkAuthorizationHeaders();
	/*if (payload && payload.withFile) {
		console.log('3 ', newMethod, data )
	}*/
	return axios({
		method: newMethod || method,
		url: url,
		headers: combineHeaders(headers),
		params: params,
		data: data
	});
};

export { api };
