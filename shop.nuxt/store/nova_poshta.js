import {  statusState, filtersState } from '../store_common/commonState';
import { fetch_items, delete_item, save_data, multipurpose_response } from '../store_common/commonActions';
import { dataMutations, statusMutations } from '../store_common/commonMutations';
// import { prepareDataFunctions } from '@/services/api_helpers';

// initial products state
const scopedState = {
	citiesList: [],
	citiesLoading: false,
	warehousesList: [],
	warehousesLoading: false,
};

const state = () => ({ ...statusState, ...filtersState, ...scopedState });
const mutations = { ...dataMutations, ...statusMutations};

const getters = {
	// favoritedProducts: state => state.users,
};

// actions
const actions = {
	// get_context_pyload() {	return {axios:this.$axios, router:this.$router} },

	fetch_cities(storeArgs, payload = {}) {
		// console.log(storeArgs.rootState.auth.cookie_hash)
		const extendedPayload = { ...payload,
			axios:this.$axios,
			stateProp: 'citiesList',
			loadingProp: 'citiesLoading',
			// alternateResponseProp: 'data',
			prepareData: 'prepareCitiesList',
			notNotify: true,
		}
		return multipurpose_response(storeArgs, `/location/cities`, extendedPayload);
	},

	fetch_warehouses(storeArgs, payload = {}) {
		// console.log(storeArgs.rootState.auth.cookie_hash)
		const extendedPayload = { ...payload,
			axios:this.$axios,
			stateProp: 'warehousesList',
			loadingProp: 'warehousesLoading',
			// alternateResponseProp: 'data',
			notNotify: true,
		}
		return multipurpose_response(storeArgs, `/location/cities/warehouses`, extendedPayload);
	},


	set_cities({ commit }, items = []) {
		const payload = { stateProp: 'citiesList', value: items };
		commit('SET_STATE', payload);
	},
	set_warehouses({ commit }, items = []) {
		const payload = { stateProp: 'warehousesList', value: items };
		commit('SET_STATE', payload);
	},


	// -------------------

};


export default {
	namespaced: true,
	state,
	getters,
	actions,
	mutations
};
