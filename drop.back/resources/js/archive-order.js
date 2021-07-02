$(document).ready(function() {
  $('body').on('click', '.btn-admin-order--archive', function() {
    let $self = $(this);

    let orderId = $self.data('id');

    axios
      .put('admin/orders/' + orderId + '/archive')
      .then((response) => {
        let orderStatus = _.get(response, ['data', 'order', 'status']);

        $('span[data-id="' + orderId + '"][data-order-status="' + orderStatus + '"]').removeClass('hide');
        $('button[data-id="' + orderId + '"][data-order-status="' + orderStatus + '"]').addClass('hide');
      });
  });
});