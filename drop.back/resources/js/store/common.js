export default {
  methods: {
    buildKey(cache, key) {
      key = !_.isArray(key) ? [key] : key;
      key.unshift(cache);
      return key;
    },

    hasInCache(cache, key) {
      return _.has(this, this.buildKey(cache, key));
    },

    fromCache(cache, key, defaultValue = []) {
      if(_.isFunction(defaultValue)) {
        if(this.hasInCache(cache, key))
          return _.get(this, this.buildKey(cache, key));
        else
          return defaultValue();
      }

      return _.get(this, this.buildKey(cache, key), defaultValue);
    },

    toCache(cache, key, data) {
      if(!this[cache]) _.set(this, cache, {});
      _.set(this, this.buildKey(cache, key), data);
    },

    fromOrToCache(cache, key, callable) {
      if(this.hasInCache(cache, key)) {
        return callable(true, () => {
          return this.fromCache(cache, key);
        });
      }

      callable(false, (items) => {
        this.toCache(cache, key, items);
        return items;
      });
    }
  }
}