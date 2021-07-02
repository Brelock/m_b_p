$(document).ready(function () {
    $('body').on('click', '.btn-cart--order', function () {
        let productId = $(this).data('product-id');
        axios
            .post('products/order', {
                product_id: productId
            }).then((response) => {
            window.cartQuantitiy.$emit('incrementCartQuantity');
        });
    });
});