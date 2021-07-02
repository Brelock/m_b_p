<?php
use Illuminate\Support\Facades\URL;

$url = URL::to(route('departments'));
?>

@extends('site.layouts.app')

@include('site.includes.meta_tags')

@section('content')
  <!-- Start of page code insertion here -->
  <div id="departmentsPage" class="departmentsPage page evalDepPage">

    <section class="pageSection white-bg">
      <div class="mcontainer sectionBlock">
        <div class="sectionBlock filter-block flex wrap center">
          <div class="formRow chosen-wrapper mcol-xs-12 mcol-sm-6">
            <label for="2" class="title mcol-xs-12 mcol-sm-4">{{ __('main.city') }}</label>
            <select name="city" id="city_id" data-placeholder="Все" class="mcol-xs-12 mcol-sm-4">
              <option value="national">{{ __('main.choose_city') }}</option>
              @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city['title_'.$locale] }}</option>
              @endforeach
            </select>
          </div>
          <div class="formRow chosen-wrapper mcol-xs-12 mcol-sm-6">
            <label for="2" class="title mcol-xs-12 mcol-sm-4">{{ __('main.choose_office') }}</label>
            <select name="test" id="department" data-placeholder="Текст для ввода" class="mcol-xs-12 mcol-sm-4" data-all="{{ __("main.all_offices") }}">
              <option value="all">{{ __('main.all_offices') }}</option>
            </select>
          </div>
        </div>

        <div class="buttonWrapper submitButtonWrapper">
            <a id="link2eval" class="standardButton secondary border-decor" href="#">{{ __('main.confirm') }}</a>
        </div>

      </div>

    </section>

  </div>
  <!-- End of page code insertion here -->
@endsection

@section('scripts')
  <script>
    var url=@json($url);
    $(document).ready(function () {
      $('#department').change(function() {
        var dep = $(this).val();
        var link = url+'/'+dep+'/chooseEvaluation';
        $('#link2eval').attr('href', link);
      });
    });
  </script>
  <script src="{{asset('js/site/departmentsMap.min.js')}}"></script>
@endsection