<div id="popupActions" class="popupActions popup 1js_open 1js_animate">
    <div class="popupContentWrapper">
        <!-- <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button> -->

        <header class="modalHeader relative">
            <div class="modal-title title">Скидка 20%</div>
        </header>

        <div class="popUpContainer">
            <div class="description contentRow">
                <p>{{ __('main.20_modal_want_discount') }}</p>
                <p class="sub-description">{!! __('main.20_modal_text') !!}</p>
            </div>

            <form action="https://newkapital.zengi.top/main/discount" class="standard-form questions-form contentRow" id="actionSubscribePopupForm">
                <div class="formRow">
                    <input class="border-decor" type="text" placeholder="Ваше имя" name="name" id="discount-name" data-validate="required" data-error-text="Введите имя">
                </div>
                <div class="formRow">
                    <input class="border-decor" type="text" placeholder="Ваш email" name="email" id="discount-email" data-validate="isEmail" data-error-text="Некорректный e-mail">
                </div>
                <div class="formRow">
                    <input class="border-decor" type="tel" placeholder="Ваш телефон" name="phone" id="discount-phone" data-validate="required" data-error-text="Введите телефон">
                </div>

                <div class="submitButtonWrapper">
                    <div class="more-button inversed">
                        <div class="more-button-wrapper">
                            <div class="more-button-container">
                                <button id="discount" type="submit" class="title semi-bold actionSubscribeSubmitButton">Отправить</button>
                                <i class="icomoon standard-arrow-icon inversed"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>