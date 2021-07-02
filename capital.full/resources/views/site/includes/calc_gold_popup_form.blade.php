<!-- форма на оценку по золоту -->
<div id="popupRequest" class="popupRequest popup">
    <div class="popupContentWrapper calculator-category">
        <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button>

        <header class="modalHeader relative">
            <div class="modal-title title">{{ __('main.request_process') }}</div>
        </header>

        <div class="popUpContainer flex wrap">
            <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 flex column">
                <div class="description standard-form">

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.product_weight') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resWeight-js">12 г</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.product_hallmark') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resHall-js">333</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.stones') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resStones-js">Нет</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.tariff_plan') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resTariff-js">нулевой</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.your_term') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resDays-js">8</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.credit_amount') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resAmount-js">4704грн</p>
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                            <label>{{ __('main.credit_percentages') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-4">
                            <p class="resOverPayment-js">3.76грн</p>
                        </div>
                    </div>

                </div>

                <div class="buttonWrapper submitButtonWrapper">
                    <button type="button" class="standardButton white border-decor popupCloseButton">{{ __('main.edit') }}</button>
                </div>
            </div>

            <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 flex column">

                <form action="#" class="standard-form calculate-form contentRow">

                    <div class="contentRow formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="401m">{{ __('main.fio') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <input id="401m" class="border-decor" type="text" placeholder="{{ __('main.your_name') }}" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="402m">{{ __('main.phone_number') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <input id="402m" class="border-decor" type="tel" value="" placeholder="0XX XXX XXXX" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}">
                        </div>
                    </div>

                    <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="403m">E-mail</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <input id="403m" class="border-decor" type="email" placeholder="Ваш E-mail" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                        </div>
                    </div>

                    <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="404m">{{ __('main.city') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="404m" data-placeholder="{{ __('main.choose_city') }}" class="" data-validate="required" data-error-text="{{ __('main.city_required') }}">
                                <option value=""></option>
                                <option value="1" >Без статуса</option>
                                <option value="2" >Option 2</option>
                                <option value="3" >Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="formRow flex wrap ">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="photoDropzoneModal">{{ __('main.upload_photo') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <div id="photoDropzoneModal" class="js_dropzone photoDropzone" action="#"></div>
                        </div>
                    </div>



                    <div class="submitButtonWrapper">
                        <div class="more-button inversed">
                            <div class="more-button-wrapper">
                                <div class="more-button-container">
                                    <button type="submit" class="title semi-bold">{{ __('main.send_request') }}</button>
                                    <i class="icomoon standard-arrow-icon inversed"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>