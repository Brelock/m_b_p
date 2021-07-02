window.cartQuantitiy = new Vue({
    el: '#cartQuantity',
    data() {
        return {
            ordersCount: 0
        };
    },
    created() {
        this.ordersCount = +$('#cartQuantity #quantity').text();

        this.$on('incrementCartQuantity', () => ++this.ordersCount);
        this.$on('decrementCartQuantity', () => --this.ordersCount);
        this.$on('nullableCartQuantity', () => this.ordersCount = 0);
    }
});