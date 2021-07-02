<footer class="mainFooter">
  <div class="mcontainer">
    <div class="cont-footer">
      <div class="logo visible-viewportchecker visibility--check hidden">
          <a href="{{ route('site.home') }}"> <img src="/img/logoEuroLombard.svg" alt=""></a>
      </div>
      <div class="contacts visible-viewportchecker visibility--check hidden">
        <div class="title">{{ trans('main.our_contacts') }}</div>
        {!!  $settings['our_contact_'.$locale] !!}
      </div>
      <div class="social-wrapper visible-viewportchecker visibility--check hidden">
        <div class="title">{{ trans('main.our_social') }}</div>
        <ul class="social-mobile-list">
          <li>
            <span class="icon-social-fb"></span>
            <a target="blank" href="{{ $settings->facebook }}" class="social-item-link"></a>
          </li>
          <li>
            <span class="icon-social-inst"></span>
            <a target="blank" href="{{ $settings->instagram }}" class="social-item-link"></a>
          </li>
          <!-- <li>
            <span class="icon-social-yt"></span>
            <a href="#" class="social-item-link"></a>
          </li> -->
          <li>
            <span class="icon-social-telegram"></span>
            <a  target="blank" href="{{ $settings->telegram }}" class="social-item-link"></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="bottom-footers visible-viewportchecker visibility--check hidden">
      <span>{{ trans('main.all_rights_reserved') }}</span>
      <span><a href="https://zengineers.company">{{ trans('main.developed_in') }} <i>Zengineers.Company</i></a></span>
    </div>
  </div>
</footer>