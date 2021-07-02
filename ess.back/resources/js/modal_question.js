(function () {
	$(document).ready(function () {

		const $btnOverlay = $('.modal_overlay');
		const $btnClose = $('.modal-close-button');
		const { initForm } = glob.ModalsFormModule;


		function openModal(btn) {
			const { btnText, formType, formTarget, modalTarget, slidersTarget } = btn.dataset;
			const formElement = document.getElementById(formTarget);
			const modalElement = document.getElementById(modalTarget);
			const slidersElement = document.querySelector(`#${slidersTarget} .sliders-data`);

			if (modalElement && formElement) {
				$('body').addClass('js_pageOverlayOpen');
				formElement.reset();
				const modalTitle = modalElement.querySelector('.modal_title');
				if (btnText) {
					modalTitle.textContent = btnText;
				}
				initForm({ formElement: formElement, form_type: formType, slidersDataBlock: slidersElement });
				$(modalElement).fadeIn();
			}
		}

		function closeModal() {
			$('body').removeClass('js_pageOverlayOpen');
			// $modalForm[0].reset();
			$('.modal-block').fadeOut();
		}

		// ----------question----

		$btnClose.on('click', function () {
			closeModal();
		})

		$btnOverlay.click(function () {
			closeModal();
		})

		$('.notification-modal .notification-close-button').on('click', function () {
			$('.notification-modal').fadeOut();
		})


		// -----------Question-----------

		// ---------------
		$('.modal_open_button').on('click', function (e) {
			openModal(this);
		})

		// -----------findCost-----------
		const formCostFind = document.getElementById('project_cost__form');

		if (formCostFind) {
			initForm({
				formElement: formCostFind,
			});
		}

		// -----------Cost calculate-----------
		const formCostCalculate = document.getElementById('project-cost-calculacte__form');

		if (formCostCalculate) {
			initForm({
				formElement: formCostCalculate,
				slidersDataBlock: document.querySelector('.sliders-data')
			});
		}


		// -----------company calculate-----------
		const companyCalculate = document.getElementById('question_company_form');

		if (companyCalculate) {
			initForm({
				formElement: companyCalculate,
				// slidersDataBlock: document.querySelector('#question_company_form .sliders-data')
			});
		}

		// -----------footer calculate-----------
		const footerCalculate = document.getElementById('footer_project_cost__form');

		if (footerCalculate) {
			initForm({
				formElement: footerCalculate,
				// slidersDataBlock: document.querySelector('#footer_project_cost__form .sliders-data')
			});
		}

	});

})();