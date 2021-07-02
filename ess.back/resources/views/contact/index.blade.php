@extends('layouts.app')

@section('content')
  <div id="contactPage" class="contactPage page">
    <div class="contact-page-wrap">
      <div class="contact-page-body-wrap">
         @include('layouts.header.header')
        <div class="wrap-title">{{ __('header.contacts') }}</div>
        <div class="breadcrumbs">
          <ul class="breadcrumbs-wrap">
            <li class="breadcrumbs-link"><a href="{{ route('site.home') }}">{{ __('common.main') }}</a></li>
            <li class="breadcrumbs-link active-link"><a href="#">{{ __('header.contacts') }}</a></li>
          </ul>
        </div>

          <div id="contactMap" 
         class="map contact-section-maps"
         data-lat="47.91692331"
         data-lng="33.39047511"
         data-imgurl="img/location-pin.svg"></div>

         @include('layouts.footers.contact-footer')
      </div>
      <footer>
        <div class="bottom-footer">
              <div class="footer-content-wrap">
                <p class="footer-copirate">{{ __('contact-footer.protected') }}</p>
                <p class="footer-dev-company">{{ __('contact-footer.designed') }} <a class="footer-dev-company__link"
                                                                href="https://zengineers.company/">Zengineers.company</a></p>
              </div>
        </div>
      </footer>               
    </div>
  </div>


  <div class="overlay__hide"></div
@endsection