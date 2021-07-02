import CommonHelper from './mixins/common-helper'
import FormHelper from './mixins/form-helper'
import FormInputEventsHelper from './mixins/form-input-events-helper'
import NovaPoshtaWarehousesStore from './store/novaposhta-warehouses'

const cart = new Vue({
  el: '#basketPage',
  mixins: [
    CommonHelper,
    FormHelper,
    FormInputEventsHelper,
    NovaPoshtaWarehousesStore
  ],

  data() {
    return {
      sourceAxiosRequest: null,

      editingProcess: false,
      deletingProcess: false,
      checkoutProcess: false,

      confirmItemsError: null,
      checkoutErrors: null,

      order: null,
      confirmData: null,

      ORDER_OPTIONS: window._ORDER_OPTIONS,
      PAYMENT_TYPES: window._PAYMENT_TYPES,
      DELIVERY_TYPES: window._DELIVERY_TYPES
    };
  },

  created() {
    this.init();
  },

  mounted() {
    $('[data-server-render="true"]').remove();
  },

  computed: {
    dropTotalAmount() {
      return _.sumBy(_.get(this.order, 'orderProducts', []), this.callbackCalcAmount('amount_drop'));
    },

    tradeTotalAmount() {
      return _.sumBy(_.get(this.order, 'orderProducts', []), this.callbackCalcAmount('amount_trade'));
    },

    totalAmount() {
      let total = this.tradeTotalAmount;

      if (!this.isUseTradePrice(total))
        total = this.dropTotalAmount;

      return total;
    },

    earningsAmount() {
      let amount = this.confirmData.amount_cash_delivery - this.totalAmount;

      if (amount > 0)
        return amount;

      return 0;
    },

    warehouses() {
      return this.fromCache('novaposhtaCitiesCollection', this.novaposhtaCitiesActive);
    }
  },

  watch: {
    'confirmData.novaposhta_city_id': function (val, oldVal) {
      this.confirmData.novaposhta_warehouse_id = null;

      let params = {
        cityId: val
      };

      if (val) {
        this.fetchNovaposhtaCities(params);
      } else {
        this.setActiveNovaposhtaCitiesCache(params, []);
      }
    }
  },

  methods: {
    init() {
      this.order = window._ORDER;
      this.confirmData = _.merge(this.newConfirmData(), _.clone(this.order));
    },

    newConfirmData() {
      return {
        dropshipper_full_name: '',
        dropshipper_phone_number: '',
        payment_type: window._PAYMENT_TYPES.CASH_PAYMENT,
        delivery_type: window._DELIVERY_TYPES.NOVA_POSHTA,
        delivery_general_info: '',
        novaposhta_first_name: '',
        novaposhta_middle_name: '',
        novaposhta_last_name: '',
        novaposhta_phone_number: '',
        novaposhta_city_id: null,
        novaposhta_warehouse_id: null,
        amount_cash_delivery: 0
      };
    },

    callbackCalcAmount(attribute) {
      return (item) => {
        return _.get(item, attribute);
      };
    },

    isUseTradePrice(amount) {
      return amount >= this.ORDER_OPTIONS.PRICE_TRADE_FROM_MIN_AMOUNT;
    },

    calculateAmount(price, quantity) {
      return _.floor(price * quantity, 2);
    },

    recalculateAmounts(item, quantity) {
      item.amount_drop = this.calculateAmount(_.get(item, 'price_drop', 0), quantity);
      item.amount_trade = this.calculateAmount(_.get(item, 'price_trade', 0), quantity);
    },

    quantityUp(e, item) {
      e.stopImmediatePropagation();

      item.quantity += 1;

      this.recalculateAmounts(item, item.quantity);

      this.delay()(() => this.sendRequestSavingItem(item), 100);
    },

    quantityDown(e, item) {
      e.stopImmediatePropagation();

      if (item.quantity - 1 > 0) {
        item.quantity -= 1;

        this.recalculateAmounts(item, item.quantity);

        this.delay()(() => this.sendRequestSavingItem(item), 100);
      }
    },

    changeQuantity(e, item) {
      let quantity = +e.target.value;

      if (quantity <= 0) {
        e.preventDefault();
        e.target.value = item.quantity;

        return false;
      }

      item.quantity = quantity;

      this.recalculateAmounts(item, item.quantity);

      this.delay()(() => this.sendRequestSavingItem(item), 100);

      return true;
    },

    sendRequestSavingItem(order) {
      if (this.sourceAxiosRequest)
        this.sourceAxiosRequest.cancel();

      this.editItem(order);
    },

    editItem(item, index = 0) {
      this.sourceAxiosRequest = axios.CancelToken.source();

      this.editingProcess = true;
      this.confirmItemsError = null;

      axios
        .put('cart/edit-item/' + _.get(item, 'id'), {
          quantity: _.get(item, 'quantity', 1)
        })
        .then((response) => {
          this.sourceAxiosRequest = null;
        })
        .catch((error) => _.forEach(
          _.get(error, ['response', 'data'], []),
          (error, key) => {
            this.confirmItemsError = this.confirmItemsError || {};
            this.confirmItemsError['orders.' + index + '.' + key] = error;
          }
        ))
        .then(() => this.editingProcess = false);
    },

    deleteItem(item) {
      this.deletingProcess = true;
      axios
        .delete('cart/delete-item/' + _.get(item, 'id'))
        .then((response) => {
          this.order.orderProducts.splice(this.order.orderProducts.indexOf(item), 1);

          window.cartQuantitiy.$emit('decrementCartQuantity');
        })
        .catch((error) => this.deletingProcess = false)
        .then(() => this.deletingProcess = false);
    },

    checkout() {
      if (this.checkoutProcess)
        return false;

      this.checkoutProcess = true;
      this.checkoutErrors = null;

      axios
        .post('cart/checkout', this.confirmData)
        .then((response) => {
          window.location.replace('cart/success');
        })
        .catch((error) => this.checkoutErrors = _.get(error, ['response', 'data'], []))
        .then(() => this.checkoutProcess = false);
    }
  }
});