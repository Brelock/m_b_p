export default {
  methods: {
    equalsArrays(array1, array2) {
      // (_.isArray(val) && _.isArray(oldVal) ? !val.equals(oldVal) : val != oldVal)
      // if the other array is a falsy value, return
      if (!_.isArray(array1) && !_.isArray(array2))
        return false;

      // compare lengths - can save a lot of time
      if (array1.length != array2.length)
        return false;

      for (var i = 0, l=array1.length; i < l; i++) {
        // Check if we have nested arrays
        if (array1[i] instanceof Array && array2[i] instanceof Array) {
          // recurse into the nested arrays
          if (!this.equalsArrays(array1[i], array2[i]))
            return false;
        }
        else if (array1[i] != array2[i]) {
          // Warning - two different object instances will never be equal: {x:20} != {x:20}
          return false;
        }
      }
      return true;
    },

    clone: function (obj) {
      var copy;

      // Handle the 3 simple types, and null or undefined
      if (null == obj || "object" != typeof obj) return obj;

      // Handle Date
      if (obj instanceof Date) {
        copy = new Date();
        copy.setTime(obj.getTime());
        return copy;
      }

      // Handle Array
      if (obj instanceof Array) {
        copy = [];
        for (var i = 0, len = obj.length; i < len; i++) {
          copy[i] = this.clone(obj[i]);
        }
        return copy;
      }

      // Handle Object
      if (obj instanceof Object) {
        copy = {};
        for (var attr in obj) {
          if (obj.hasOwnProperty(attr)) copy[attr] = this.clone(obj[attr]);
        }
        return copy;
      }

      throw new Error("Unable to copy obj! Its type isn't supported.");
    },

    delay: (function() {
      let timer = 0;
      return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
      };
    }),

    omitEmpty(object) {
      let params = {};
      for(let property in object) {
        let value = _.get(object, property);
        if(!(value === '' || (_.isArray(value) && value.length === 0) || value === null || (_.isString(value) && value.trim() === ''))) {
          _.set(params, property, value);
        }
      }

      return params;
    },

    requiredAllProperties(object) {
      return _.keys(this.omitEmpty(object)).length === _.keys(object).length;
    },

    toFormatDate(date, originalFormat = 'DD/MM/YYYY', makeFormat = 'YYYY-MM-DD') {
      if(!_.isEmpty(date))
        return moment(date, originalFormat).format(makeFormat);

      return date;
    },

    pluck(array, key) {
      return array.map(o => o[key]);
    },

    generateHash(length = 10) {
      let hash = "";
      let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < length; i++)
        hash += possible.charAt(Math.floor(Math.random() * possible.length));

      return hash;
    },

    toUrl: function(obj) {
      let str = [];
      for(let p in obj) {
        if (obj.hasOwnProperty(p)) {
          str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
      }

      return str.join("&");
    },

    numberRoundOff(number, precision = 2) {
      return _.floor(number, precision);
    },

    changeWindowHistory(path, data = '', title = '') {
      let parameters = this.globalWindowHistoryState();

      let hasNotQuestionMark = !/\/.*?\?{1,}/g.test(path);
      let hasNotAmpersand = !/\&$/g.test(path);
      path = path + (
              parameters
              ? (hasNotQuestionMark
                  ? '?'
                  : (hasNotAmpersand ? '&' : ''))
              : ''
            ) + parameters;

      window.history.replaceState(data, title, path);
    },

    globalWindowHistoryState() {
      return (!_.isEmpty(window._FRAME_GET_PARAMETERS) ? this.toUrl(window._FRAME_GET_PARAMETERS) : '');
    },

    hasAny(object, params) {
      for(let i=0; i<params.length; i++)
        if(_.has(object, params[i]))
          return true;

      return false;
    },

    readURL: function(input, cb) {
      if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
          cb(e, e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    },

    isMobile() {
      if(window.innerWidth <= 800 && window.innerHeight <= 600) {
        return true;
      } else {
        return false;
      }
    }
  }
};