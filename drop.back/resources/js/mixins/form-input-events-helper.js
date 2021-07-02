export default {
  methods: {
    isNumber(event) {
      event = (event) ? event : window.event;

      let charCode = (event.which) ? event.which : event.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        event.preventDefault();
      } else {
        return true;
      }
    },

    isEmptyResetDefaultValue(event, defaultValue) {
      if(_.isEmpty(event.target.value)) {
        event.target.value = defaultValue;
      }

      return true;
    }
  }
}