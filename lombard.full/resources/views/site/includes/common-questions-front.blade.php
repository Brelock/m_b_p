<div class="common-questions-wrap-list shell-form">
  <div class="title visible-viewportchecker visibility--check hidden">{{ trans('main.faqs') }}</div>

  @forelse($faq as $faqItem)
  <div class="questions-item visible-viewportchecker visibility--check hidden">
    <div class="header-item">
      {{ $faqItem['title_'.$locale] }}
    </div>
    <div class="info-drop-questions">
      {{ $faqItem['description_'.$locale] }}
    </div>
    <div class="icon-wrap-block">
      <span class="icon-questions-plus"></span>
    </div>
  </div>
  @empty
    Нет вопросов
  @endforelse
  <div class="visible-viewportchecker visibility--check hidden">
    @include('site.includes.callback-questions-form-front')
  </div>
</div>