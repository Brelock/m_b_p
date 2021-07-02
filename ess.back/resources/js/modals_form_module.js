glob.ModalsFormModule = (function () {
  const { findItemBy } = glob.helpers;
  const { axios } = glob;

  // let form;
  // let formType;
  // let formType_label;

  const TYPES = {
    QUESTION: 1,
    REQUEST: 2,
    PARTNER: 3,
    INDIVIDUAL_CALCULATION: 4,
    ENTERPRISE_CALCULATION: 5,
    CREDIT: 6,
    INSURANCE: 7,
    SUNPORT_CALCULATION: 8
  }

  const typesList = [
    { id: TYPES.QUESTION, label: 'Вопрос' },
    { id: TYPES.REQUEST, label: 'Запрос' },
    { id: TYPES.PARTNER, label: 'Партнерство' },
    { id: TYPES.INDIVIDUAL_CALCULATION, label: 'Расчет частному лицу' },
    { id: TYPES.ENTERPRISE_CALCULATION, label: 'Расчет предприятию' },
    { id: TYPES.CREDIT, label: 'Кредитирование' },
    { id: TYPES.INSURANCE, label: 'Страхование' },
    { id: TYPES.SUNPORT_CALCULATION, label: 'Sunport расчет' }
  ];

  // function 

  function initForm({ formElement, form_type, slidersDataBlock, btn }) {
    const form = formElement instanceof jQuery ? formElement[0] : formElement;
    const formType = form_type || form.dataset.formType;

    const typeItem = findItemBy('id', formType, typesList)
    const formType_label = typeItem ? typeItem.label : null;
    const spinner = btn ?
      btn.parentElement.querySelector('.spinner') :
      form.querySelector('.spinner');

    for (let input of form) {
      input.oninvalid = function ({ target }) {
        const { errorText } = target.dataset;
        target.setCustomValidity("");

        if (!target.validity.valid) {
          target.setCustomValidity(errorText || 'обязательное поле');
        }
      }
      // console.log(input)
      input.oninput = function ({ target }) {
        target.setCustomValidity("");
        const { replaceRequiredFor } = target.dataset;
        if (replaceRequiredFor) {
          const targetField = form.querySelectorAll(`[name="${replaceRequiredFor}"]`)[0];
          if (target.validity.valid) {
            // console.log(targetField)
            targetField.removeAttribute('required');
          } else {
            targetField.setAttribute('required', '');
          }
        }
      };
    }
    // console.log(formType, formType_label)

    // ---------------
    form.onsubmit = (e) => {
      e.preventDefault();

      if (spinner) {
        spinner.classList.add('loading');
      }

      const payload = {
        method: 'POST',
        url: `/callbacks`,
        data: prepareBody({
          form: form,
          formType: formType,
          slidersDataBlock: slidersDataBlock
        })
      };

      let hname = window.location.origin;
      let lname = window.location.pathname.split('/')[1];
      lname = (lname === "ru") ? lname += "/" : lname = "";

      let urlStatistic = hname + "/" + lname + "statistic"

      // return;
      axios(payload)
      .then(response => {
        // console.log(response)
        if (response.status && response.status == 200) {
          $('.modal-block').fadeOut();
          window.location.href = urlStatistic
            // $('#question_notification').fadeIn();
          }

          if (spinner) {
            spinner.classList.remove('loading');
          }
          // window.location.reload();
        })
        .catch(e => {
          console.warn(e);
          if (spinner) {
            spinner.classList.remove('loading');
          }
        });

    }
  }

  function prepareBody({ form, formType, slidersDataBlock }) {
    let body = {
      type: formType
    };
    let messageStr = '';

    for (let field of form) {
      if (!field.hasAttribute('not-send')) {
        if (!field.classList.contains('for_message_field')) {
          if (field.value || typeof field.value == 'boolean') {
          // console.log(field, field.value)
            body[field.name] = field.value;
          }
        } else if (field.value || typeof field.value == 'boolean') {

          const title = field.dataset.labelName;
          const value = field.value;
          messageStr += `${title}-${value};`
        }
      }
    }

    if (slidersDataBlock) {
      // let messageStr = ''
      const dataBlocks = slidersDataBlock.querySelectorAll('.sliders-data .slider-data-item');

      for (let block of dataBlocks) {
        const title = block.querySelector('.label-name').textContent;
        const value = block.querySelector('.mark-active').textContent;
        messageStr += `${title}-${value};`
      }
    }
    // console.log('messageStr: ', messageStr)
    if (messageStr) {
      if (body.message) {
        body.message += ';' + messageStr;
      } else {
        body.message = ';' + messageStr;
      }
    } 

    return body;
  }


  return {
    initForm: initForm,
    // prepareBody: prepareBody
  }
})()

// ---------Validation Script Test-------------

// $('body').on('click', 'button[type="submit"]', function(e) {
//   // console.log('ok')
//   e.preventDefault();

//   // ValidationModule.isValid(this.form)
//   if( !ValidationModule.isValid(this.form) ) {
//     console.log('form not valid: ', this.form)
//   } else {
//     console.log('form valid: ', this.form)
//   }
// })