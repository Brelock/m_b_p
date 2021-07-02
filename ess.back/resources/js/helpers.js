glob.helpers = (function() {
  
  const findItemBy = (property, value, itemsList = [], settings = {}) => {
    const { notStrict, returnIndex } = settings;
    let result = null;
    let index;
    if (itemsList.length) {
      for (let i = 0; i < itemsList.length; i++) {
        if (itemsList[i][property]) {
          if (notStrict) {
            if (itemsList[i][property] == value) {
              result = itemsList[i];
              index = i;
              break;
            }
          } else {
            if (itemsList[i][property] === value) {
              result = itemsList[i];
              index = i;
              break;
            }
          }
        }
      }
    }
    return returnIndex ? { item: result, index: index } : result;
  };

  return {
    findItemBy: findItemBy,
  }
})()