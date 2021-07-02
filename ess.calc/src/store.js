import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    app_ready : false,
    is_mobile : false,

    stantions_power : [],
    inventors : [],
    panels : [],
    constructions : [],
    defences : [],
    electric_meters : [],

    panel_count : 0,

    selected_stantion : undefined,
    selected_inventor : undefined,
    selected_panel : undefined,
    selected_construction : undefined,
    settings : undefined,
    company : undefined,

    add_data_loaded : false,

  },
  mutations: {
    is_mobile(state, value){
      state.is_mobile = value
    },
    add_data_loaded(state, value){
      state.add_data_loaded = value
    },
    stantions_power(state, value){
      state.stantions_power = value
    },
    inventors(state, value){
      state.inventors = value
    },
    append_inventors(state, value){
      state.inventors = [...state.inventors, ...value]
    },
    panels(state, value){
      state.panels = value
    },
    append_panels(state, value){
      state.panels = [...state.panels, ...value]
    },
    constructions(state, value){
      state.constructions = value
    },
    defences(state, value){
      state.defences = value
    },
    electric_meters(state, value){
      state.electric_meters = value
    },
    settings(state, value){
      state.settings = value
    },
    panel_count(state, value){
      state.panel_count = value
    },
    company(state, value){
      state.company = value
    },
    // SELECTIONS
    selected_stantion(state, value){
      state.selected_stantion = value
    },
    selected_inventor(state, value){
      state.selected_inventor = value
    },
    selected_panel(state, value){
      state.selected_panel = value
      if (value)
        state.panel_count = Math.ceil(state.selected_stantion.power / value.power) 
    },
    selected_construction(state, value){
      state.selected_construction = value
    },

  },
  actions: {
    // DATA gathering
    fetch_stantion_power(){ return axios.get(`${Vue.prototype.$apiURL}/solar/stantionpower`) },
    fetch_inventors(){ return axios.get(`${Vue.prototype.$apiURL}/solar/inventor`) },
    fetch_panels(){ return axios.get(`${Vue.prototype.$apiURL}/solar/panel`) },
    fetch_constructions(){ return axios.get(`${Vue.prototype.$apiURL}/solar/construction`) },
    fetch_defences(){ return axios.get(`${Vue.prototype.$apiURL}/solar/defence`) },
    fetch_electric_meters(){ return axios.get(`${Vue.prototype.$apiURL}/solar/electricmeter`) },
    fetch_settings(){ return axios.get(`${Vue.prototype.$apiURL}/solar/appsettings`)},    
    fetch_company(){ return axios.get(`${Vue.prototype.$apiURL}/catalog/company`)},    

    gather_next_inventors({commit, dispatch}, next){
      console.log('gather_next_inventors', next);
      axios
        .get(next)
        // .get('https://cors-anywhere.herokuapp.com/' + next)
        .then(res => {
          if (res.data.next){
            dispatch('gather_next_inventors', res.data.next)
          }
          commit('append_inventors', res.data.results)
        })
        .catch(error => console.log(error))
    },
    gather_next_panels({commit, dispatch}, next){
      console.log('gather_next_panels', next);
      
      axios
        .get(next)
        // .get('https://cors-anywhere.herokuapp.com/' + next)
        .then(res => {
          if (res.data.next){
            dispatch('gather_next_panels', res.data.next)
          }
          commit('append_panels', res.data.results)
        })
        .catch(error => console.log(error))
    },
    get_data({commit, dispatch}){
      axios
        .all([dispatch('fetch_stantion_power'), 
              dispatch('fetch_inventors'),
              dispatch('fetch_panels'),
              dispatch('fetch_constructions'),
              dispatch('fetch_defences'),
              dispatch('fetch_electric_meters'),
              dispatch('fetch_settings'),
              dispatch('fetch_company'),])
        .then(axios.spread(
          (stantions_power, inventors, panels, constructions, defences, electric_meters, settings, company) => {
            commit('stantions_power', stantions_power.data.results)
            commit('inventors', inventors.data.results)
            commit('panels', panels.data.results)
            commit('constructions', constructions.data.results)
            commit('defences', defences.data.results)
            commit('electric_meters', electric_meters.data.results)
            commit('settings', settings.data.results[0])
            commit('company', company.data.results[0])
            if (inventors.data.next){
              dispatch('gather_next_inventors', inventors.data.next)
            }
            if (panels.data.next){
              dispatch('gather_next_panels', panels.data.next)
            }
            commit('add_data_loaded', true)
          }
        ))
        .catch(error => console.log(error))
    },
  // SELECTIONS
    selected_stantion({commit}, value){
      commit('selected_stantion', value)
    },
    selected_inventor({commit}, value){
      commit('selected_inventor', value)
    },
    selected_panel({commit}, value){
      commit('selected_panel', value)
    },
    selected_construction({commit}, value){
      commit('selected_construction', value)
    },
    stantion_power_changed({commit}){
      commit('selected_inventor', undefined)
      commit('selected_panel', undefined)
      commit('selected_construction', undefined)
    },
    reset_selection({commit, dispatch}){
      dispatch('stantion_power_changed')
      commit('selected_stantion', undefined)
    },
    panel_count({commit}, value){
      commit('panel_count', value)
    }
  }
})
