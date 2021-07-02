@extends('site.layouts.app')

@include('site.includes.meta_tags')

@section('content')


    <!-- Start of page code insertion here -->
    <div id="calculatorPage" class="calculatorPage page calculator-category">

        <section class="pageSection white-bg">
          <div class="mcontainer">

            <div class="sectionBlock">
              <div class="sectionHeader">
                <div class="animated-border-block section-title sectionHeaderItem">
                  <div class="svg-container">
                    <svg class="rect-container">
                      <rect x="0" y="0" class="animatedBlock"/>
                      <rect x="0" y="0" stroke-width="4" class="overlappingBlock"/>                
                    </svg>
                    <h1 class="title">{{ trans('main.calculate_your_credit') }}</h1>
                  </div>
                </div>

                {{--<ul class="breadcrumbs sectionHeaderItem">--}}
                  {{--<li><a href="/index.html">Главная</a></li>--}}
                  {{--<li class="active"><a href="#">Рассчитать кредит</a></li>--}}
                {{--</ul>--}}
                {{ Breadcrumbs::render('calculator') }}
              </div>
            </div>

            <div class="calculatorCategoryNavBar categoryNavBar tabsNav sectionBlock">

              <div class="mobileButtonsWrapper showButton " 
                   data-button-type="button" data-menu-type="drop-down" data-target="categoriesMenu">
                <div class="arrow-button-container">
                  <i class="icomoon icon-angle"></i>
                </div>
                <div class="active-category-container">
                  <span class=""></span>
                </div>
              </div>

              <div id="categoriesMenu" class="tabButtons hiddenContent height">
                <div class="content-container">
                  <button data-target="gold-tab" class="category @if(isset($type) and $type == 'gold') active @elseif(!isset($type)) active @endif">{{ __('main.bail_gold') }}</button>
                  <button data-target="technics-tab" class="category @if(isset($type) and $type == 'gadget') active @endif">{{ __('main.bail_gadget') }}</button>
                  <button data-target="silver-tab" class="category @if(isset($type) and $type == 'silver') active @endif">{{ __('main.bail_silver') }}</button>
                </div>
              </div>
            </div>
            
            <div class="toggleBlocks-list animation sectionBlock">

              <div id="gold-tab" class="toggleBlock">
             
                <form id="gold-form" action="#" class="standard-form calculate-form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 ">
                    <div class="content-container">
                        
                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="1">{{ __('main.weight') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <input id="1" class="border-decor" name="weight" type="text" placeholder="" data-validate="isNumberSecondary" data-error-text="{{ __('main.weight_required') }}">
                            <span class="input-description">{{ __('main.min_weight') }}</span>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="2">{{ __('main.hallmark') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="2" name="hallmark" data-placeholder="{{ __('main.hallmark_choose') }}" required data-validate="required" data-error-text="{{ __('main.hallmark_required') }}" class="">
                              <option value=""></option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                            </select>
                          </div>
                        </div>

                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <div class="label">{{ __('main.stones') }}</div>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-4 ">
                            <div class="customCheckboxContainer radioStandard flex center justifyCenter">
                              <div class="radioWrapper">
                                <input id="21" type="radio" name="additions" class="yes" checked><label for="21">{{ __('main.yes') }}</label>
                              </div>
                              <div class="radioWrapper">
                                <input id="22" type="radio" name="additions" class="no"><label for="22">{{ __('main.no') }}</label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="3">{{ __('main.lending_terms') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="3" data-placeholder="{{ __('main.tariff_choose') }}" required data-validate="required" data-error-text="{{ __('main.tariff_required') }}" name="tariff" class="">
                              <option value=""></option>
                              <option value="1" selected></option>
                              <option value="2" >Option 2</option>
                              <option value="3" >Option 3</option>
                            </select>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="4">{{ __('main.your_status') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="4" data-placeholder="{{ __('main.default_status') }}" data-validate="required" data-error-text="{{ __('main.status_required') }}" class="">
                              <option value=""></option>
                              @forelse($statuses as $status)
                                <option value="{{ $status->id }}" data-id="{{ $status->id }}">{{ $status['title_'.$locale] }}</option>
                              @empty
                              @endforelse
                            </select>
                          </div>
                        </div>

                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="5">{{ __('main.your_term') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7 flex center sliderWrapper">
                            <div class="slider-range"></div>
                            <!-- <input id="5" class="border-decor" type="text" placeholder=""> -->
                          </div>
                        </div>
                        
                        <div class="buttonWrapper submitButtonWrapper">
                          <button type="button" class="standardButton white border-decor submitButton">{{ __('main.calculate') }}</button>
                        </div>

                    </div>
                  </div>

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 resultBlock bottom">
                    <div class="content-container animation">

                      <div class="toggleBlock no-result-block active">
                      <div class="graphs-block mock contentRow">
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="description result-description contentRow text-center">
                          <p>{{ __('main.here_result') }}</p>
                        </div>
                      </div>
                      <!--  -->

                      <div class="toggleBlock has-result-block">
                        <div class="graphs-block contentRow">
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block main"></div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_amount') }}</p>
                                <p class="result amount-js">2708 грн</p>
                              </div>
                            </div>
                          </div>
                          
                          <div class="graph-item disabled">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block secondary"  style="height: 90px"></div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_percentages') }}</p>
                                <p class="result overPayment-js">424.18 грн</p>
                              </div>
                            </div>
                          </div>
                        
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block secondary"  style="height: 30px">
                                  <div class="action-block">
                                    <div class="text">{{ __('main.get') }} <br> {{ __('main.discount') }}</div>
                                    <div class="tip triangle triangle-bottom">-20%</div>
                                  </div>
                                </div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_percentages') }}</p>
                                <p class="result amount-discount-js">424.18 грн</p>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                        
                        <div class="description result-description contentRow">
                          <p>{{ __('main.credit_descr') }} <a class="js_setTariff" href="{{ route('tariffs') }}">"tariff"</a></p>
                        </div>
                        <div class="description result-description contentRow">
                          <p>{{ __('main.credit_message') }}</p>
                        </div>
                        
                        <div class="contentRow">
                          <div class="submitButtonWrapper buttonsWrapper">
                            <div class="more-button inversed">
                              <div class="more-button-wrapper">
                                <div class="more-button-container">
                                  <button type="button" class="title semi-bold calcModal">{{ __('main.send_request') }}</button>
                                  <i class="icomoon standard-arrow-icon inversed"></i>
                                </div>
                              </div>
                            </div>

                            <a href="{{ route('departments') }}" class="standardButton white border-decor">{{ __('main.closest_office') }}</a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>

              <div id="technics-tab" class="toggleBlock">
                <form id="technics-form" action="/calculatorPage.html" class="standard-form calculate-form flex wrap" enctype="multipart/form-data">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 fluid">

                    <div class="sectionBlock subToggleBlocks-list animation">

                      <div id="startBlock" class="toggleBlock choseCategoryBlock mobileCategory otherCategory active">
                        <div class="content-container">
                          <div class="tabButtons flex center">
                            <div data-group="mobileCategory" data-direction="next" class="seriesTab">
                              <div class="title">{{ __('main.phone_tab') }}</div>
                              <div class="imgWrapper">
                                <img src="/img/mobile.jpg" alt="img">
                              </div>
                            </div>
                            <div data-group="otherCategory" data-direction="next" class="seriesTab">
                              <div class="title">{{ __('main.another_device') }}</div>
                              <div class="imgWrapper">
                                <img src="/img/technika.jpg" alt="img">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="toggleBlock otherCategory accordionGroupParent">
                        <div class="content-container">
                          <div class="prevButton buttonWrapper contentRow">
                            <button data-direction="prev" class="link-with-icon seriesTab">
                              <i class="icomoon icon-angle"></i>
                              <span>{{ __('main.back') }}</span>
                            </button>
                          </div>

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">1</span>
                            <span class="title">{{ __('main.gadget_type') }}</span>
                          </div>

                          <div class="contentRow formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="101">{{ __('main.technics_type') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="101" class="border-decor" type="text" placeholder="{{ __('main.for_example') }}, телевизор или ноутбук" name="category" data-validate="required" data-error-text="{{ __('main.type_required') }}">
                            </div>
                          </div>

                          <div class="contentRow formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="102">{{ __('main.brand') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="102" class="border-decor" type="text" placeholder="{{ __('main.for_example') }}, Sumsung, Philips, Sony" data-validate="required" name="barnd" data-error-text="{{ __('main.brand_required') }}">
                            </div>
                          </div>

                          <div class="formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="103">{{ __('main.model') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="103" class="border-decor" type="text" placeholder="{{ __('main.for_example') }}, U38N, OE341A" name="model" data-validate="required" data-error-text="{{ __('main.model_required') }}">
                            </div>
                          </div>

                          <div class="formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <div class="label">{{ __('main.i_have_pc') }}</div>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-4">
                              <div class="customCheckboxContainer radioStandard flex center justifyCenter">
                                <div class="radioWrapper">
                                  <input id="104" type="radio" name="computerChoiceGroup" value="" class="showButton yes"
                                      data-button-type="radio" data-menu-type="drop-down" data-group="computerChoiceGroup" data-target="computerChoice">
                                  <label for="104">{{ __('main.yes') }}</label>
                                </div>
                                <div class="radioWrapper">
                                  <input id="105" type="radio" name="computerChoiceGroup" value="" class="showButton no"
                                      data-button-type="radio" data-menu-type="drop-down" data-group="computerChoiceGroup" checked
                                  ><label for="105">{{ __('main.no') }}</label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div id="computerChoice" class="hiddenContent height computerChoiceGroup formRow">
                            <div class="content-container">
                              <div class="formRow flex wrap">
                                <div class="formBlock mcol-xs-12 mcol-sm-5">
                                  <label for="106">{{ __('main.processor') }}</label>
                                </div>
                                <div class="formBlock mcol-xs-12 mcol-sm-7">
                                  <input id="106" class="border-decor" name="cpu" type="text" placeholder="">
                                </div>
                              </div>

                              <div class="formRow flex wrap">
                                <div class="formBlock mcol-xs-12 mcol-sm-5">
                                  <label for="107">{{ __('main.memory') }}</label>
                                </div>
                                <div class="formBlock mcol-xs-12 mcol-sm-7">
                                  <input id="107" class="border-decor" name="memory" type="text" placeholder="">
                                </div>
                              </div>

                              <div class="formRow flex wrap">
                                <div class="formBlock mcol-xs-12 mcol-sm-5">
                                  <label for="108">{{ __('main.hdd') }}</label>
                                </div>
                                <div class="formBlock mcol-xs-12 mcol-sm-7">
                                  <input id="108" class="border-decor" name="hdd" type="text" placeholder="">
                                </div>
                              </div>

                              <div class="formRow flex wrap">
                                <div class="formBlock mcol-xs-12 mcol-sm-5">
                                  <label for="109">{{ __('main.video') }}</label>
                                </div>
                                <div class="formBlock mcol-xs-12 mcol-sm-7">
                                  <input id="109" class="border-decor" name="video" type="text" placeholder="">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="formRow flex wrap ">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="photoDropzone">{{ __('main.upload_photo') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <!-- <input id="qwe" class="border-decor" type="file" name="files[]" placeholder="Добавить фото"> -->
                              <div id="photoDropzoneGadgets" class="js_dropzone photoDropzone " action="/">
                                <!-- <input id="fileInput" type="file" name="files[]" multiple>                               -->
                              </div>
                            </div>
                          </div>

                          <div class="buttonWrapper submitButtonWrapper">
                            <button data-direction="next" class="standardButton white border-decor seriesTab next">{{ __('main.next') }}</button>
                          </div>
                        </div>

                      </div>

                      <div class="toggleBlock mobileCategory 1active">

                        <div class="content-container">
                          <div class="prevButton buttonWrapper contentRow">
                            <button data-direction="prev" class="link-with-icon seriesTab">
                              <i class="icomoon icon-angle"></i>
                              <span>{{ __('main.back') }}</span>
                            </button>
                          </div>

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">1</span>
                            <span class="title">{{ __('main.gadget_type') }}</span>
                          </div>

                          <div class="contentRow formRow chosen-wrapper flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="311">{{ __('main.brand') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <select id="311" data-placeholder="{{ __('main.choose_brand') }}" class="" name="brand" data-validate="required" data-error-text="{{ __('main.brand_required') }}">
                                <option value=""></option>
                                <option value="1" >Без статуса</option>
                                <option value="2" >Option 2</option>
                                <option value="3" >Option 3</option>
                              </select>
                            </div>
                          </div>

                          <div class="formRow chosen-wrapper flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="312">{{ __('main.model') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <select id="312" data-placeholder="{{ __('main.choose_model') }}" class="modelsSelect" name="model" data-validate="required" data-error-text="{{ __('main.model_required') }}">
                                <option value=""></option>
                                <option value="1" >Без статуса</option>
                                <option value="2" >Option 2</option>
                                <option value="3" >Option 3</option>
                              </select>
                            </div>
                          </div>

                          <div class="buttonWrapper submitButtonWrapper">
                            <button data-direction="next" class="standardButton white border-decor seriesTab next">{{ __('main.next') }}</button>
                          </div>

                        </div>
                      </div>

                      <div class="toggleBlock mobileCategory otherCategory">
                        <div class="content-container">
                          <div class="prevButton buttonWrapper contentRow">
                            <button data-direction="prev" class="link-with-icon seriesTab">
                              <i class="icomoon icon-angle"></i>
                              <span>{{ __('main.back') }}</span>
                            </button>
                          </div>

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">2</span>
                            <span class="title">{{ __('main.condition') }}</span>
                          </div>

                          <div class="contentRow">
                            <div class="customCheckboxContainer radioCircle" data-validate="requiredRadio" data-error-text="{{ __('main.item_required') }}">
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="201" type="radio" name="condition" data-multiplier="1" class="" value="Устройство с явными дефектами корпуса, наличие дефектов на дисплее: пятна (белые, желтые, зеленые), засветы, битые пиксели, трещины и сколы. Множественные глубокие царапины, хорошо заметные вмятины, явные следы падения, отсутствие деталей, но при этом основные узлы полностью работоспособны."><label for="201"></label>
                                </div>
                                <label for="201" class="labelText">{{ __('main.condition1') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="202" type="radio" name="condition" data-multiplier="2" class="" value="Устройство с активными следами эксплуатации. Возможны незначительные трещинки корпуса, сильные потертости, единичные глубокие царапины, незначительные следы падений. Наличие не более двух битых пикселей."><label for="202"></label>
                                </div>
                                <label for="202" class="labelText">{{ __('main.condition2') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="203" type="radio" name="condition" data-multiplier="3" class="" value="Устройство с незначительными следами использования. Возможны не глубокие царапины на корпусе, незначительные потертости на дисплее, затертые углы, но не следы падений."><label for="203"></label>
                                </div>
                                <label for="203" class="labelText">{{ __('main.condition3') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="204" type="radio" name="condition" data-multiplier="4" class="" value="Устройство в отличном состоянии, почти новое. Возможны незначительные микроцарапины на задней крышке. Недопустимо наличие повреждений на дисплее, следов падения и прочих дефектов."><label for="204"></label>
                                </div>
                                <label for="204" class="labelText">{{ __('main.condition4') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="205" type="radio" name="condition" data-multiplier="5" class="" value="Новое устройство, в идеальном состоянии, без малейших дефектов. Наличие любых потертостей, царапин, сколов, пятен, вмятин и прочих дефектов не допустимо. Наличие кассового чека не позднее, чем 14 дней от дня приобретения устройства."><label for="205"></label>
                                </div>
                                <label for="205" class="labelText">{{ __('main.condition5') }}</label>
                              </div>
                            </div>
                          </div>

                          <div class="buttonWrapper submitButtonWrapper">
                            <button data-direction="next" class="standardButton white border-decor seriesTab next">{{ __('main.next') }}</button>
                          </div>

                        </div>
                      </div>

                      <div class="toggleBlock mobileCategory otherCategory">
                        <div class="content-container">
                          <div class="prevButton buttonWrapper contentRow">
                            <button data-direction="prev" class="link-with-icon seriesTab">
                              <i class="icomoon icon-angle"></i>
                              <span>{{ __('main.back') }}</span>
                            </button>
                          </div>

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">3</span>
                            <span class="title">Комплект</span>
                          </div>

                          <div class="contentRow">
                            <div class="customCheckboxContainer radioCircle" data-validate="requiredRadio" data-error-text="{{ __('main.item_required') }}">
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="301" type="radio" name="set" data-multiplier="1" class="" value="Комплект отсутствует. В наличии только устройство."><label for="301"></label>
                                </div>
                                <label for="301" class="labelText">{{ __('main.set1') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="302" type="radio" name="set" data-multiplier="2" class="" value="В наличии только зарядное устройство."><label for="302"></label>
                                </div>
                                <label for="302" class="labelText">{{ __('main.set2') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="303" type="radio" name="set" data-multiplier="3" class="" value="В наличии: зарядное устройство, заводская упаковка, документы (возможно отсутствие документов)."><label for="303"></label>
                                </div>
                                <label for="303" class="labelText">{{ __('main.set3') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="304" type="radio" name="set" data-multiplier="4" class="" value="Полный комплект который гарантирует производитель."><label for="304"></label>
                                </div>
                                <label for="304" class="labelText">{{ __('main.set4') }}</label>
                              </div>
                              <div class="formRow">
                                <div class="radioWrapper">
                                  <input id="305" type="radio" name="set" data-multiplier="5" class="" value="Полный комплект который гарантирует производитель. Обязательно наличие гарантийного талона и чека о покупке."><label for="305"></label>
                                </div>
                                <label for="305" class="labelText">{{ __('main.set5') }}</label>
                              </div>
                            </div>
                          </div>

                          <div class="buttonWrapper submitButtonWrapper">
                            <button data-direction="next" class="standardButton white border-decor seriesTab submitButton next">{{ __('main.next') }}</button>
                          </div>
                        </div>
                      </div>

                      <div class="toggleBlock mobileCategory otherCategory 1active">
                        <div class="content-container">
                          <div class="prevButton buttonWrapper contentRow flex">
                            <button data-direction="prev" class="link-with-icon seriesTab hideResult">
                              <i class="icomoon icon-angle"></i>
                              <span>{{ __('main.back') }}</span>
                            </button>
                          </div>

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">4</span>
                            <span class="title">{{ __('main.calculation') }}</span>
                            <span class="block-text title">{{ __('main.check_set') }}</span>
                          </div>

                          <div class="contentRow formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="401">{{ __('main.fio') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="401" class="border-decor" type="text" placeholder="{{ __('main.type_your_name') }}" name="name" data-validate="required" data-error-text="{{ __('main.field_required') }}" value="">
                            </div>
                          </div>

                          <div class="formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="402">{{ __('main.phone_number') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="402" class="border-decor" type="tel" placeholder="0XX XXX XXXX" name="phone" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}" value="">
                            </div>
                          </div>

                          <div class="formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="403">E-mail</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <input id="403" class="border-decor" type="email" placeholder="{{ __('main.type_email') }}" name="email">
                            </div>
                          </div>

                          <div class="formRow chosen-wrapper flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="404">{{ __('main.calc_city') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <select id="404" data-placeholder="{{ __('main.choose_city') }}" class="" name="city">
                                <option value=""></option>
                                <option value="1" >Без статуса</option>
                                <option value="2" >Option 2</option>
                                <option value="3" >Option 3</option>
                              </select>
                            </div>
                          </div>

                          <div class="formRow chosen-wrapper flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <label for="405">{{ __('main.office_address') }}</label>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-7">
                              <select id="405" data-placeholder="{{ __('main.choose_office') }}" class="" name="office">
                                <option value=""></option>
                                <option value="1" >Без статуса</option>
                                <option value="2" >Option 2</option>
                                <option value="3" >Option 3</option>
                              </select>
                            </div>
                          </div>

                          <div class="formRow flex wrap">
                            <div class="formBlock mcol-xs-12 mcol-sm-5">
                              <div class="label">{{ __('main.i_agree') }}</div>
                            </div>
                            <div class="formBlock mcol-xs-12 mcol-sm-4">
                              <div class="customCheckboxContainer radioStandard flex center justifyCenter">
                                <div class="radioWrapper">
                                  <input id="406" type="radio" name="technicsPersonalInfoAgreed" class="yes" value="" data-validate="requiredCheck" data-error-text="{{ __('main.agree_required') }}"><label for="406">{{ __('main.yes') }}</label>
                                </div>
                                <div class="radioWrapper">
                                  <input id="407" type="radio" name="technicsPersonalInfoAgreed" class="no" value="" checked><label for="407">{{ __('main.no') }}</label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="buttonWrapper submitButtonWrapper js_block_toggle active">
                            <button data-direction="next" type="submit" class="standardButton white border-decor seriesTab submitFormButton">{{ __('main.next') }}</button>
                          </div>

                          <div class="js_block_toggle">
                            <div class="buttons-container flex">
                              <div class="buttonWrapper mcol-xs-12">
                                <a href="{{ route('site.home') }}" class="standardButton white border-decor">{{ __('main.back_home') }}</a>
                              </div>

                              <div class="more-button inversed mcol-xs-12">
                                <div class="more-button-wrapper">
                                  <div class="more-button-container">
                                    <button data-target="startBlock" class="title semi-bold seriesTab">{{ __('main.next_request') }}</button>
                                    <i class="icomoon standard-arrow-icon inversed"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>

                      <div class="toggleBlock successBlock mobileCategory otherCategory">
                        <div class="content-container">

                          <div class="contentRow stepContainer">
                            <span class="stepNumber">6</span>
                            <span class="title">{{ __('main.request') }}</span>
                          </div>

                          <div class="flex column content-wrapper">
                            <div class="page-title title"></div>

                            <div class="category-name"></div>

                            <div class="buttons-container flex wrap">
                              <div class="buttonWrapper mcol-xs-12">
                                <a href="/index.html" class="standardButton white border-decor">{{ __('main.back_home') }}</a>
                              </div>

                              <div class="more-button inversed mcol-xs-12">
                                <div class="more-button-wrapper">
                                  <div class="more-button-container">
                                    <button data-target="startBlock" class="title semi-bold seriesTab">{{ __('main.next_request') }}</button>
                                    <i class="icomoon standard-arrow-icon inversed"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="sectionBlockColumn_md resultBlock flex mcol-xs-12 mcol-md-6 top">
                    <div class="content-container animation">

                      <div class="toggleBlock no-result-block active">
                        <div class="graphs-block mock contentRow">
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="description result-description contentRow text-center">
                          <p>{{ __('main.here_result') }}</p>
                        </div>
                      </div>

                      <!--  -->

                      <div class="toggleBlock has-result-block">
                        <div class="contentRow stepContainer">
                          <span class="stepNumber">5</span>
                          <span class="title">{{ __('main.set') }}</span>
                        </div>

                        <div class="contentRow mrow flex">
                          <div class="mcol-xs-6">
                            <div class="imgWrapper">
                              <img src="img/image_mock.jpg" alt="image error">
                              <input type="hidden" name="image">
                            </div>

                            <div class="product-description">
                              <p class="name"></p>
                              <p class="price"></p>
                              <input type="hidden" name="price">
                            </div>

                            <div class="request-answer">
                              <img src="img/icons/message-on-phone.svg" alt="" class="request-answer__img">
                              <div class="request-answer__text">
                                {{ __('main.we_will_send_sms') }}
                              </div>
                            </div>
                          </div>

                          <div class="mcol-xs-6">
                            <ul class="description">
                              <li class="condition">
                                <div class="description-title">{{ __('main.condition') }}</div>
                                <p></p>
                              </li>

                              <li class="set">
                                <div class="description-title">{{ __('main.set') }}</div>
                                <p></p>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </form>
              </div>

              <div id="silver-tab" class="toggleBlock">
                <form id="silver-form" action="#" class="standard-form calculate-form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 ">
                    <div class="content-container">
                        
                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="31">{{ __('main.weight') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <input id="31" class="border-decor" type="text" required data-validate="isNumberSecondary" data-error-text="{{ __('main.weight_required') }}" name="weight" placeholder="">
                            <span class="input-description">{{ __('main.min_weight') }}</span>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="32">{{ __('main.hallmark') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="32" data-placeholder="{{ __('main.hallmark_choose') }}" data-validate="required" data-error-text="{{ __('main.hallmark_required') }}" name="hallmark" class="">
                              <option value=""></option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                            </select>
                          </div>
                        </div>

                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <div class="label">{{ __('main.stones') }}</div>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-4 ">
                            <div class="customCheckboxContainer radioStandard flex center justifyCenter">
                              <div class="radioWrapper">
                                <input id="33" type="radio" name="additions" class="yes" checked><label for="33">Да</label>
                              </div>
                              <div class="radioWrapper">
                                <input id="34" type="radio" name="additions" class="no"><label for="34">Нет</label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="35">{{ __('main.lending_terms') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="35" data-placeholder="{{ __('main.tariff_choose') }}" data-validate="required" data-error-text="{{ __('main.tariff_required') }}" class="">
                              <option value=""></option>
                              <option value="1" selected></option>
                              <option value="2" >Option 2</option>
                              <option value="3" >Option 3</option>
                            </select>
                          </div>
                        </div>

                        <div class="formRow chosen-wrapper flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="36">{{ __('main.your_status') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7">
                            <select id="36" data-placeholder="{{ __('main.choose_status') }}" data-validate="required" data-error-text="{{ __('main.status_required') }}" class="">
                              <option value=""></option>
                              @forelse($statuses as $status)
                                <option value="{{ $status->id }}" data-id="{{ $status->id }}">{{ $status['title_'.$locale] }}</option>
                              @empty
                              @endforelse
                            </select>
                          </div>
                        </div>

                        <div class="formRow flex wrap">
                          <div class="formBlock mcol-xs-12 mcol-sm-5">
                            <label for="37">{{ __('main.your_term') }}</label>
                          </div>
                          <div class="formBlock mcol-xs-12 mcol-sm-7 flex center sliderWrapper">
                            <div class="slider-range"></div>
                            <!-- <input id="5" class="border-decor" type="text" placeholder=""> -->
                          </div>
                        </div>
                        
                        <div class="buttonWrapper submitButtonWrapper">
                          <button type="button" class="standardButton white border-decor submitButton">{{ __('main.calculate') }}</button>
                        </div>

                    </div>
                  </div>

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 resultBlock bottom">
                    <div class="content-container animation">

                      <div class="toggleBlock no-result-block active">
                      <div class="graphs-block mock contentRow">
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="description result-description contentRow text-center">
                          <p>{{ __('main.here_result') }}</p>
                        </div>
                      </div>
                      <!--  -->

                      <div class="toggleBlock has-result-block">
                      <div class="graphs-block contentRow">
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block main"></div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_amount') }}</p>
                                <p class="result amount-js">2708 грн</p>
                              </div>
                            </div>
                          </div>
                          
                          <div class="graph-item disabled">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block secondary"  style="height: 90px"></div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_percentages') }}</p>
                                <p class="result overPayment-js">424.18 грн</p>
                              </div>
                            </div>
                          </div>
                        
                          <div class="graph-item">
                            <div class="item-content">
                              <div class="diagram">
                                <div class="diagram-block secondary"  style="height: 30px">
                                  <div class="action-block">
                                    <div class="text">{{ __('main.get') }} <br> {{ __('main.discount') }}</div>
                                    <div class="tip triangle triangle-bottom">-20%</div>
                                  </div>
                                </div>
                              </div>
                              <div class="description-block">
                                <p>{{ __('main.credit_percentages') }}</p>
                                <p class="result amount-discount-js">424.18 грн</p>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                        
                        <div class="description result-description contentRow">
                          <p>{{ __('main.credit_descr') }} <a class="js_setTariff" href="{{ route('tariffs') }}">"abba"</a></p>
                        </div>
                        <div class="description result-description contentRow">
                          <p>{{ __('main.credit_message') }}</p>
                        </div>
                        
                        <div class="contentRow">
                          <div class="submitButtonWrapper buttonsWrapper">
                            <div class="more-button inversed">
                              <div class="more-button-wrapper">
                                <div class="more-button-container">
                                  <button type="button" class="title semi-bold calcModal">{{ __('main.send_request') }}</button>
                                  <i class="icomoon standard-arrow-icon inversed"></i>
                                </div>
                              </div>
                            </div>

                            <a href="{{ route('departments') }}" class="standardButton white border-decor">{{ __('main.closest_office') }}</a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>

            </div>

          </div>

        </section>

      </div>  

    

@endsection