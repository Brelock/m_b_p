const initAjaxHeaders = () => {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
};

const prepareFormData = (form) => {
  let inputs = form.querySelectorAll("input");
  let selects = form.querySelectorAll("select");

  let data = {};
  if (inputs.length) {
    for (let i = 0; i < inputs.length; i++) {
    inputs[i].value ? (data[inputs[i].name] = inputs[i].value) : null;
    }
  }

  if (selects.length) {
    for (let i = 0; i < selects.length; i++) {
    selects[i].value && selects[i].value != "placeholder"
      ? (data[selects[i].name] = selects[i].value)
      : null;
    }
  }

  // data = JSON.stringify( data );
  return data;
}

const handleCalc = () => {
  $forms.on("submit", function (e) {
    e.preventDefault();
  
    let data = prepareFormData(this);
    let categoryId = data.category_id;

    handleResultHtml(categoryId, data); /* test */
    changeValBtn($(this)); /* test */

    $.ajax({
      type: "POST",
      url: window.location.origin + ``,
      data: data,
    })
      .done(function (response) {
      console.log("res", response);
      handleResultHtml(categoryId, response.data);
      changeValBtn($(this));
      })
      .fail(function (error) {
      console.log(error);
      }); 
  });
}

const handleResultHtml = (categoryId, value) => {
  addResultItemToList(categoryId, value);
}

const changeValBtn = (form) => { 
  let btnSubmit = 'Скасувати';
  if ($('html:lang(ua)').length) {
    btnSubmit = 'Скасувати';
  } else if ($('html:lang(ru)').length) {
    btnSubmit = 'Отменить';
  }
  const $thisBtnForm = form.find(".button");
  $thisBtnForm.addClass("to_back");
  $thisBtnForm.html(`${btnSubmit}`);
}

const addResultItemToList = (categoryId, value) => {

  let title = 'Ви отримаєте';
  let description = 'Подані суми є орієнтовними.' +
                    'Точно оцінити ваше заставне майно зможе лише' +
                    'експерт-оцінювач в ломбардному відділенні' +
                    'після його перевірки';
  
  if ($('html:lang(ua)').length) {
    title = 'Ви отримаєте';
    description = 'Подані суми є орієнтовними.' +
                  'Точно оцінити ваше заставне майно зможе лише' +
                  'експерт-оцінювач в ломбардному відділенні' +
                  'після його перевірки';
  } else if ($('html:lang(ru)').length) {
    title =  'Вы получите';
    description = 'Представленные суммы являются ориентировочными.' +
                  'Точно оценить ваше залоговое имущество сможет только' +
                  'эксперт-оценщик в ломбардном отделении' +
                  'после его проверки';
  }

  const resultItem = `
    <div class="body-result">
      <div class="result-title">${title}</div>   
      <div class="body-list_value">
        <div class="value_data">${value}</div>
        <div class="value_replace"> &#8372 </div>
      </div>

      <div class="rate_on_loan"> 
        <div class="rate_title">${'Сума % за кредит'}</div>
        <div class="rate_val">${'0.50'} &#8372 </div>
      </div>
      <div class="description_result">${description}</div>
    </div>
  `;
  
  $resultList.html('');
  $resultList.append(resultItem);
  handleShowClearAllBtn();

}

const handleShowClearAllBtn = () => {
  $('.result-blocks .splash-screen').hide();
}

const isFillCheckInputs = () => {
/*   const $btnForm = $('.wrap-select-option').find(".button");
  $btnForm.addClass("disabled");
  $btnForm.attr('disabled', true);

  const $isCheck = $(".isCheck");
  $isCheck.on("blur", validInput);

  function validInput(el) {
    let $flag = true;
    let $input = $(el.currentTarget).closest(".flex_wrapper").find('.isCheck');
    // const $btnForm = $(".button");

    const $inputs = $input.each(function () {
      if ($(this).val() == 0 || $(this).val() == "") {
        $flag = false;
      }
    });
    if ($flag == true) {
      $btnForm.removeClass("disabled");
      $btnForm.attr('disabled', false);
    } else {
      $btnForm.addClass("disabled");
      $btnForm.attr('disabled', true);
    }
  } */
}

const initNoUiSlideBottom = () => {
  // let slider = document.getElementById('bottom-slide-panel');

  // let $sliderDay = $('.mslider-day');

  // noUiSlider.create(slider, {
  //   start: 1,
  //   connect: [true, false],
  //   step: 1,
  //   range: {
  //     'min': 1,
  //     'max': 30
  //   },
  // });

  // slider.noUiSlider.on('update', function(values,handle,unencoded) {
  //  const whole = values[0].split(".")[0]
  //  $sliderDay.html(whole);
  // });
}

// export {initNoUiSlideBottom};