<div id="popupMessage-second" class="popupMessage-second popup">
	<div class="popupContentWrapper">
        <div class="popUpContainer">
            <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button>
            <i class="icomoon icon-logo-capital"></i>
            
            <h3 class="popupMessage-second__title">{{ $settings['title_'.$locale] }}</h3>

            <p class="popupMessage-second__descr">{!! $settings['description_'.$locale] !!}</p>

            <div class="more-button inversed">
                <div class="more-button-wrapper">
                    <div class="more-button-container">
                        <a href="{{ $settings['link_'.$locale] }}" class="title semi-bold">{{ $settings['button_'.$locale] }}</a>
                        <i class="icomoon standard-arrow-icon inversed"></i>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>