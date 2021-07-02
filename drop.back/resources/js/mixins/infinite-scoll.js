export default  {
  methods: {
    hasNextPage(items, total, page, max, isLoading = false) {
      return isLoading ||
             (_.isArray(items) &&
               items.length > 0 &&
               this.totalToNextPage(total, page, max) > 0);
    },

    totalToNextPage(total, page, max) {
      let totalNext = total - (page * max);
      return totalNext > max ? max : totalNext;
    }
  }
};