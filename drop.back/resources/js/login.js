import CommonHelper from './mixins/common-helper'
import FormHelper from './mixins/form-helper'

const authorization = new Vue({
  el: '#authPage',
  mixins: [CommonHelper, FormHelper],
  data() {
    return {
      loginProcess: false,
      loginErrors: null,
      loginAttributes: null
    };
  },
  created() {
    this.loginAttributes = this.newLoginAttributes();
  },
  methods: {
    newLoginAttributes() {
      return {
        email: '',
        password: ''
      };
    },

    submitLogin(e) {
      e.preventDefault();
      this.login();
    },

    login() {
      if(this.loginProcess) {
        return false;
      }

      this.loginProcess = true;
      this.loginErrors = null;

      axios
        .post('admin/auth', this.loginAttributes)
        .then(response => {
          this.storeToken(_.get(response, ['data', 'data', 'access_token']));
          window.location.reload();
        })
        .catch((error) => this.loginErrors = _.get(error, ['response', 'data'], []))
        .then(() => this.loginProcess = false);
    },

    storeToken(token) {
      if(!token) {
        return false;
      }

      localStorage.setItem('_jwtToken', token);
    }
  }
});