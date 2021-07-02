@extends('site.layouts.app')

@section('content')


    <div id="feedbackPage" class="feedbackPage page">

        <section class="pageSection white-bg">
            <div class="mcontainer">
                <div class="content-container ">

                    <div class="img-container flex justifyCenter sectionBlock">
                        <div class="imgWrapper">
                            <img src="{{ asset('img/wink.svg') }}" alt="wink">
                        </div>
                    </div>

                    <p class="text sectionBlock">{{ __('main.choose_variant') }}</p>

                    <form id="feedback-form"  method="POST" action="{{ route('evaluations.update', ['evaluation' => $evaluation->id]) }}" class="standard-form sectionBlock form-val-js">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-row">
                            <div class="checkbox-item">
                              <label class="checkbox-label">
                                <input name="comment[]" type="checkbox" class="form-checkbox form-checkbox--hidden" value="{{ __('main.bad_consultation') }}"
                                    data-validate-checkbox="required"> 
                                <span class="checkboxbtn">
                                  <i class="checkbox-item-icon-check"></i>
                                </span> 
                                <span>{{ __('main.bad_consultation') }}</span>
                              </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="checkbox-item">
                                <label class="checkbox-label">
                                    <input name="comment[]" type="checkbox" class="form-checkbox form-checkbox--hidden" value="{{ __('main.low_tariff') }}"
                                        data-validate-checkbox="required"> 
                                    <span class="checkboxbtn">
                                        <i class="checkbox-item-icon-check"></i>
                                    </span> 
                                    <span>{{ __('main.low_tariff') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="checkbox-item">
                                <label class="checkbox-label checkbox-label--column">
                                    <input type="checkbox" class="form-checkbox form-checkbox--hidden target-button--js" data-target="form-row--feedback" data-action-type="toggle"
                                        data-validate-checkbox="required"
                                        data-error-text="{{ __('main.checkbox_err') }}"> 
                                    <div class="flex center">
                                        <span class="checkboxbtn">
                                            <i class="checkbox-item-icon-check"></i>
                                        </span> 
                                        <span>{{ __('main.other') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-row form-row--feedback">
                            <textarea name="comment[]" id="feedback" class="border-decor" type="text" placeholder="{{ __('main.comment') }}" rows="4"></textarea>
                        </div>

                        <div class="form-row">
                            <input type="trackTel" name="phone" class="border-decor tracking" placeholder="{{ __('main.your_phone') }}" 
                              value="+38"
                              data-validate="required"
                              data-error-text="{{ __('main.field_required') }}">

                            <div class="er-courent-num" style="color: red;"></div>
                        </div>

                        <div class="submitButtonWrapper">
                            <button disabled class="disabled title semi-bold standardButton secondary border-decor" type="submit">{{ __('main.estimate') }}</button>
                        </div>
                    </form>

                    <div class="section-element phone phone-evaluation mcol-md-auto">
                        <div class="phone-icon-round-bg">
                          <i class="icomoon icon-phone"></i>
                        </div>
                        <button class="text dashed">{{ __('main.communication') }}</button>
                        <div class="phone-evaluation-descr">
                            {{ __('main.cb_message') }}
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

@endsection