import CommonStore from './common'

export default {
  mixins: [CommonStore],
  data() {
    return {
      loadingNovaposhtaCities: false,
      novaposhtaCitiesActive: null,
      novaposhtaCitiesCollection: null
    };
  },
  methods: {
    setActiveNovaposhtaCitiesCache(params, items) {
      let key = JSON.stringify(params);
      this.novaposhtaCitiesActive = key;
      this.toCache('novaposhtaCitiesCollection', key, items);
    },

    fetchNovaposhtaCities(params,
                          handleBeforeRequest = false,
                          handleSuccess = (items) => {},
                          handleError = () => {}) {
      this.loadingNovaposhtaCities = true;
      if(handleBeforeRequest) handleBeforeRequest();

      let keyCache = JSON.stringify(params);
      this.fromOrToCache('novaposhtaCitiesCollection', keyCache, (fromCache, getOrSet) => {
        if(fromCache) {
          this.novaposhtaCitiesActive = keyCache;
          this.loadingNovaposhtaCities = false;
          return handleSuccess ? handleSuccess(getOrSet()) : getOrSet();
        }

        axios.get('api/novaposhta/warehouses', { params: params })
          .then((response) => {
            let items = _.get(response, 'data');

            getOrSet(items);
            this.novaposhtaCitiesActive = keyCache;

            if(handleSuccess)
              handleSuccess(items);

            this.loadingNovaposhtaCities = false;
          })
          .catch(handleError ? handleError : () => { this.loadingNovaposhtaCities = false; })
          .then(handleSuccess ? handleSuccess : () => { this.loadingNovaposhtaCities = false; });
      });
    }
  }
};