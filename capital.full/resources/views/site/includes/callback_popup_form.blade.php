<div id="popupCallback" class="popupCallback popup 1js_open 1js_animate">
    <div class="popupContentWrapper">
        <!-- <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button> -->

        <header class="modalHeader relative">
            <div class="modal-title title">{{ trans('main.callback') }}</div>
        </header>

        <div class="popUpContainer">
            <div class="description contentRow">
                <p>{{ trans('main.enter_your_phone') }}</p>
            </div>
            <form action="{{ route('callbacks.send') }}" class="standard-form questions-form contentRow" id="popup_callback_form">
                <div class="formRow">
                    <input class="border-decor" name="name" type="text" placeholder="{{ trans('main.your_name') }}"
                           data-validate="required" data-error-text="{{ __('main.field_required') }}" required>
                </div>
                <div class="formRow">
                    <input class="border-decor" name="phone" type="tel" placeholder="{{ trans('main.your_phone') }}"
                           data-validate="required" data-error-text="{{ __('main.field_required') }}" required>
                </div>
                <div class="formRow">
					<p class="popupCallback__descr">
						{{ __('main.cb_message') }}
					</p>
				</div>

                <div class="submitButtonWrapper">
                    <div class="more-button inversed">
                        <div class="more-button-wrapper">
                            <div class="more-button-container">
                                <button type="submit" class="title semi-bold callbackPopupSubmitButton">{{ trans('main.send') }}</button>
                                <i class="icomoon standard-arrow-icon inversed"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>