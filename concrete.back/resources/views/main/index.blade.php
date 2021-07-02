<?php
/* @var \App\Models\Category $categorySlab */
/* @var \App\Models\Category $categoryWall */
/* @var \App\Models\Category $categoryColumn */
/* @var \App\Models\Setting $setting */
?>

@extends('layouts.app')

@section('content')
  <div class="calculator-blocks">

    <div class="calculator-blocks-title">{{ $setting->title }}</div>
    <div class="calculator-blocks-subtitle">{{ $setting->subtitle }}</div>
    <div class="calculator-list">
      <div class="calculator-list_left-block">
        <div class="calculator-list-figure">
          <div class="drop-down">
            <div class="selected">
              <div class="sel">{{ $categorySlab->title }}</div>
            </div>
            <div class="options">
              <div class="ul find-active_js">
                <div data-id="slabs"
                     data-src="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }} }}"
                     class="value value-one active">{{ $categorySlab->title }}</div>
                <div data-id="walls"
                     data-src="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }} }}"
                     class="value">{{ $categoryWall->title }}</div>
                <div data-id="columns"
                     data-src="{{ asset("storage/categories/{$categoryColumn->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }} }}"
                     class="value">{{ $categoryColumn->title }}</div>
              </div>
            </div>
          </div>
          <div class="icon-popup"></div>
          <div class="calculator-list-figure_img">
            <img class="img-list slabs slabs-default"
                 src="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}"
                 alt="">
            <img class="img-list walls walls-default"
                 src="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}"
                 alt="">
            <img class="img-list columns columns-default"
                 src="{{ asset("storage/categories/{$categoryColumn->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}"
                 alt="">

            <div class="set-img"></div>

          </div>

        </div>

        <div class="calculator-list-forms">

          <form class="calculator-forms slabs slabs-input active">
            <div class="calculator-forms-wrap">
              <div class="calculator-forms-container">
                <div class="calculator-forms-header">
                  <div class="forms-title">{{ $categorySlab->title }}</div>
                  <button type="button" class="forms-button-another">
                    Another Calculation
                  </button>
                </div>
                <div class="calculator-forms-body">
                      <input hidden name="category_id" value="{{ $categorySlab->id }}" type="text">
                      <fieldset class="data-inp-forms inp-feet">
                        <legend>Length</legend>
                        <label for="inp-l-v1"></label>
                        <input name="length" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::LENGTH)->pluck('file_name')->get(0)}") }}" id="inp-l-v1" placeholder="0">
                      </fieldset>
                      <fieldset class="data-inp-forms inp-feet">
                        <legend>Width</legend>
                        <label for="inp-w-v1"></label>
                        <input name="width" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::WIDTH)->pluck('file_name')->get(0)}") }}" id="inp-w-v1" placeholder="0">
                      </fieldset>
                      <fieldset class="data-inp-forms inp-inches">
                        <legend>Thickness or Height</legend>
                        <label for="inp-Th-v1"></label>
                        <input name="height" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::HEIGHT)->pluck('file_name')->get(0)}") }}" id="inp-Th-v1" placeholder="0">
                      </fieldset>
                      <fieldset class="data-inp-forms">
                        <legend>Quantity</legend>
                        <label for="inp-Q-v1"></label>
                        <input name="quantity" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categorySlab->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}" id="inp-Q-v1" placeholder="0">
                      </fieldset>
    
                </div>
              </div>
              <div class="button-calculate">
                <button disabled type="submit" class="disabled_js">
                  <div class="spinner spinner--search spinner--search-js"></div>
                  <span class="button-calculate__label">Calculate</span>
                </button>
              </div>
            </div>
          </form>

          <form class="calculator-forms walls walls-input">
            <div class="calculator-forms-wrap">
              <div class="calculator-forms-container">
                <div class="calculator-forms-header">
                  <div class="forms-title">{{ $categoryWall->title }}</div>
                  <button type="button" class="forms-button-another">
                    Another Calculation
                  </button>
                </div>
                <div class="calculator-forms-body">
                    <input hidden name="category_id" value="{{ $categoryWall->id }}" type="text">
                    <fieldset class="data-inp-forms inp-feet">
                      <legend>Length</legend>
                      <label for="inp-l-v2"></label>
                      <input name="length" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::LENGTH)->pluck('file_name')->get(0)}") }}"
                             id="inp-l-v2" placeholder="0">
                    </fieldset>
                    <fieldset class="data-inp-forms inp-inches">
                      <legend>Width</legend>
                      <label for="inp-w-v2"></label>
                      <input name="width" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::WIDTH)->pluck('file_name')->get(0)}") }}"
                             id="inp-w-v2" placeholder="0">
                    </fieldset>
                    <fieldset class="data-inp-forms inp-feet">
                      <legend>Height</legend>
                      <label for="inp-Th-v2"></label>
                      <input name="height" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::HEIGHT)->pluck('file_name')->get(0)}") }}"
                             id="inp-Th-v2" placeholder="0">
                    </fieldset>
                    <fieldset class="data-inp-forms">
                      <legend>Quantity</legend>
                      <label for="inp-Q-v2"></label>
                      <input name="quantity" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryWall->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}"
                             id="inp-Q-v2" placeholder="0">
                    </fieldset>
    
                </div>
              </div>
              <div class="button-calculate">
                <button disabled type="submit" class="disabled_js">
                  <div class="spinner spinner--search spinner--search-js"></div>
                  <span class="button-calculate__label">Calculate</span>
                </button>
              </div>
            </div>
          </form>

          <form class="calculator-forms columns">
           <div class="calculator-forms-wrap">
             <div class="calculator-forms-container">
               <div class="calculator-forms-header">
                 <div class="forms-title">{{ $categoryColumn->title }}</div>
                 <button type="button" class="forms-button-another">
                   Another Calculation
                 </button>
               </div>
                <div class="calculator-forms-body">
                   <input hidden name="category_id" value="{{ $categoryColumn->id }}" type="text">
                   <fieldset class="data-inp-forms inp-inches">
                     <legend>Diameter</legend>
                     <label for="inp-l-v3"></label>
                     <input name="diameter" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryColumn->pictures->where('type', \App\Enums\CategoryPictureTypes::DIAMETER)->pluck('file_name')->get(0)}") }}"
                            id="inp-d-v3" placeholder="0">
                   </fieldset>
                   <fieldset class="data-inp-forms inp-feet">
                     <legend>Depth or Height</legend>
                     <label for="inp-Th-v3"></label>
                     <input name="depth" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryColumn->pictures->where('type', \App\Enums\CategoryPictureTypes::DEPTH)->pluck('file_name')->get(0)}") }}"
                            id="inp-Dh-v3" placeholder="0">
                   </fieldset>
                   <fieldset class="data-inp-forms">
                     <legend>Quantity</legend>
                     <label for="inp-Q-v3"></label>
                     <input name="quantity" type="number" step="0.01" data-img="{{ asset("storage/categories/{$categoryColumn->pictures->where('type', \App\Enums\CategoryPictureTypes::MAIN)->pluck('file_name')->get(0)}") }}"
                            id="inp-Q-v3" placeholder="0">
                   </fieldset>
   
               </div>
             </div>
             <div class="button-calculate">
               <button disabled type="submit" class="disabled_js">
                 <div class="spinner spinner--search spinner--search-js"></div>
                 <span class="button-calculate__label">Calculate</span>
               </button>
             </div>
           </div>
          </form>

          
        </div>
      </div>
      <div class="calculator-list_right-block">
        <div class="calculator-list-result">
          <div class="container-mr">
            <div class="result-header">
              <div class="button-mobile-hide-result"></div>
              <div class="result-header_title">Results</div>
              <div class="result-header_replace-title">
                <div class="title-total-result">
                  <div class="result-header_data">0.00</div>
                  <div class="header_replace-yd">yd <sup>3</sup></div>
                </div>
                <button class="clear-items">Clear All</button>
              </div>
            </div>
            <div class="result-body">
              <div class="result-body-list">





              </div>
              <div class="result-body_total">
                <div class="">Total Volume</div>
                <div class="result-body_total-item">
                  <p class="result-body_total-data" data-result="0.00">0.00</p>
                  <p>yd<sup>3</sup></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="result-body_custom-overlay"></div>
      </div>
    </div>
  </div>

@endsection