<div id="popupCallbackEvaluation" class="popupCallbackEvaluation popup">
    <div class="popupContentWrapper">
        <div class="popUpContainer">
            <div class="contentRow text-center">
                <p>{{ trans('main.enter_your_phone') }}</p>
            </div>
            <div class="contentRow text-center success">
                <p>{{ trans('main.cb_success_message') }}</p>
            </div>
            <div class="contentRow text-center error">
                <p>{{ trans('main.cb_success_message_err') }}</p>
            </div>
            <form action="{{ route('callbacks.send') }}" class="standard-form questions-form contentRow form-val-js" id="popup_evaluation_callback_form">
                <div class="formRow">
                    <input class="border-decor" name="phone" type="tel" placeholder="{{ trans('main.your_phone') }}"
                           data-validate="required" data-error-text="{{ __('main.field_required') }}">

                    <input type="hidden" name="evaluation" value="true" />
                </div>

                <div class="submitButtonWrapper">
                    <button class="title semi-bold standardButton  secondary border-decor callbackEvaluationPopupSubmitButton" type="submit">{{ trans('main.send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>