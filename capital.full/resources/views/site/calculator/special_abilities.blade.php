@extends('site.layouts.app')

@include('site.includes.meta_tags')

@section('content')

    <div id="specialPage" class="specialPage page calculator-category">

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
                    <h1 class="title">{{ __('main.special_abilities') }}</h1>
                  </div>
                </div>

                {{--<ul class="breadcrumbs sectionHeaderItem">--}}
                  {{--<li><a href="/index.html">Главная</a></li>--}}
                  {{--<li><a href="/index.html">Кредиты</a></li>--}}
                  {{--<li class="active"><a href="#">Специальные возможности</a></li>--}}
                {{--</ul>--}}
                {{ Breadcrumbs::render('special.abilities') }}
              </div>
              <div class="title title-descr">{{ __('main.choose_your_bail') }}</div>
            </div>
            

            <div class="specialCategoryNavBar categoryNavBar tabsNav sectionBlock">
              
              <div class="mobileButtonsWrapper showButton" 
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
                  <div data-target="diamonds-tab" class="category specialCategory @if(isset($type) and $type == 'diamond') active @elseif(!isset($type)) active @endif">
                    <div class="content-container flex">
                      <div class="checkBlock"><i></i></div>
                      <div class="description">
                        <h3 class="title">{{ __('main.diamonds') }}</h3>
                        <p>{!! nl2br(__('main.abilities_message_diamonds')) !!}</p>
                      </div>
                    </div>
                  </div>
                  <div data-target="antiques-tab" class="category specialCategory @if(isset($type) and $type == 'antiques') active @endif">
                    <div class="content-container flex">
                      <div class="checkBlock"><i></i></div>
                      <div class="description">
                        <h3 class="title">{{ __('main.antiques') }}</h3>
                        <p>{!! nl2br(__('main.abilities_message_antiques')) !!}</p>
                      </div>
                    </div>
                  </div>
                  <div data-target="clocks-tab" class="category specialCategory @if(isset($type) and $type == 'watch') active @endif">
                    <div class="content-container flex">
                      <div class="checkBlock"><i></i></div>
                      <div class="description">
                        <h3 class="title">{{ __('main.watches') }}</h3>
                        <p>{!! nl2br(__('main.abilities_message_watches')) !!}</p>
                      </div>
                    </div>
                  </div>
                  <div data-target="jewelry-tab" class="category specialCategory @if(isset($type) and $type == 'jewelry') active @endif">
                    <div class="content-container flex">
                      <div class="checkBlock"><i></i></div>
                      <div class="description">
                        <h3 class="title">{{ __('main.jewelry') }}</h3>
                        <p>{!! nl2br(__('main.abilities_message_jewelry')) !!}</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <div class="toggleBlocks-list animation sectionBlock">

              <div id="diamonds-tab" class="toggleBlock active">
                <form id="diamonds-form" action="#" class="standard-form calculate-form special_ability_form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6">
                    <div class="content-container">
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="101">{{ __('main.stone_form') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="101" data-placeholder="{{ __('main.not_chosen') }}" name="diamond_form" class="" required data-validate="required" data-error-text="{{ __('main.field_required') }}">
                          	<option selected></option>
                            <option value="Круглая">Круглая</option>
                            <option value="Маркиз">Маркиз</option>
                            <option value="Груша">Груша</option>
                            <option value="Овал">Овал</option>
                            <option value="Сердце">Сердце</option>
                            <option value="Изумруд">Изумруд</option>
                            <option value="Багет">Багет</option>
                            <option value="Принцесса">Принцесса</option>
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="102">{{ __('main.weight_carats') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="102" class="border-decor" type="text" placeholder="" name="diamond_mass" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                        </div>
                      </div>
                  
                      <div class="title row-title">{{ __('main.stone_color') }}</div>
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="103" class="sub-label">GIA</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="103" data-placeholder="{{ __('main.not_chosen') }}" class="" name="diamond_color_GIA">
                          	<option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N-Z">N-Z</option>                            
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="103b" class="sub-label">ГОСТ</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="103b" data-placeholder="{{ __('main.not_chosen') }}" class="" name="diamond_color_gost">
                          	<option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>

                      </div>
                  
                      <div class="title row-title">{{ __('main.clearness') }}</div>
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="104" class="sub-label">GIA</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="104" data-placeholder="{{ __('main.not_chosen') }}" class="" name="diamond_cleanness_GIA">
                          	<option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="FL">FL</option>
                            <option value="IF">IF</option>
                            <option value="VVS1">VVS1</option>
                            <option value="VVS2">VVS2</option>
                            <option value="VS1">VS1</option>
                            <option value="VS2">VS2</option>
                            <option value="SI1">SI1</option>
                            <option value="SI2">SI2</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                            <option value="P4">P4</option>                            
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="105" class="sub-label">ГОСТ</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="105" data-placeholder="{{ __('main.not_chosen') }}" class="" name="diamond_cleanness_gost">
                            <option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="106">{{ __('main.geom_parameters') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="106" data-placeholder="{{ __('main.not_chosen') }}" class="" name="diamond_geometry">
                            <option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  
                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow">
                    <div class="content-container ">

                      <div class="title row-title">{{ __('main.has_certificate') }}</div>
                      <div class="formRow customCheckboxContainer radioCircle flex spaceBetween">

                        <div class="radioWrapper">
                          <input id="110" type="checkbox" name="diamond_certificate" class="" value="GIA">
                          <label for="110">
                            <span class="labelText">GIA</span>
                          </label>
                        </div>
                        <div class="radioWrapper">
                          <input id="111" type="checkbox" name="diamond_certificate" class="" value="AGS">
                          <label for="111">
                            <span class="labelText">AGS</span>
                          </label>
                        </div>
                        <div class="radioWrapper">
                          <input id="112" type="checkbox" name="diamond_certificate" class="" value="HRD">
                          <label for="112">
                            <span class="labelText">HRD</span>
                          </label>
                        </div>
                        <div class="radioWrapper">
                          <input id="113" type="checkbox" name="diamond_certificate" class="" value="EGL">
                          <label for="113">
                            <span class="labelText">EGL</span>
                          </label>
                        </div>
                        <div class="radioWrapper">
                          <input id="114" type="checkbox" name="diamond_certificate" class="" value="GCI">
                          <label for="114">
                            <span class="labelText">GCI</span>
                          </label>
                        </div>
                      </div>
                    
                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="121">{{ __('main.number_certificate') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="121" class="border-decor" name="diamond_certificate_id" type="text" placeholder="">
                        </div>
                      </div>
                  
                      <div class="formRow flex wrap ">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="photoDropzone">{{ __('main.upload_photo') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <div id="photoDropzone" class="js_dropzone photoDropzone"></div>
                        </div>
                      </div>
                  
                      <div class="formRow flex wrap ">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                         <label for="122">{{ __('main.additional_info') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <textarea id="122" class="border-decor" type="text" placeholder="" name="diamond_additional_info" data-validate="isShort" data-error-text="{{ __('main.message_length') }}"></textarea>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  
                  <div class="mcol-xs-12 mcol-md-6 contentRow last">
                    <div class="formRow flex wrap ">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="131">{{ __('main.your_name') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="131" class="border-decor" type="text" placeholder="" name="name" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="132">Ваш e-mail</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="132" class="border-decor" type="email" placeholder="" name="email">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="133">{{ __('main.your_phone') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="133" class="border-decor" type="tel" placeholder="0XX XXX XXXX" name="phone" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}">
                      </div>
                    </div>
                    
                    <div class="submitButtonWrapper more-button inversed mcol-xs-12">
                      <div class="more-button-wrapper">
                        <div class="more-button-container">
                          <button class="title semi-bold submitFormButton" type="submit">{{ __('main.send') }}</button>
                          <i class="icomoon standard-arrow-icon inversed"></i>
                        </div>
                      </div>
                    </div>
                  </div>

									<input type="hidden" name="type" value="diamond">
                </form>
              </div>

              <div id="antiques-tab" class="toggleBlock">
                <form id="antiques-form" action="#" class="standard-form calculate-form special_ability_form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6">
                    <div class="content-container">
                  
                      <div class="description formRow">
                        <p>{{ __('main.antiques_message') }}</p>
                      </div>

                    </div>
                  </div>
                  
                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow">
                    <div class="content-container ">
                  
                      <div class="formRow flex wrap top">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="photoDropzone3">{{ __('main.upload_photo') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <div id="photoDropzone3" class="js_dropzone photoDropzone"></div>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  
                  <div class="mcol-xs-12 mcol-md-6 contentRow order-last">
                    <div class="formRow flex wrap ">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="201">{{ __('main.your_name') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="201" class="border-decor" type="text" placeholder="" name="name" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="202">Ваш e-mail</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="202" class="border-decor" type="email" placeholder="" name="email">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="203">{{ __('main.your_phone') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="203" class="border-decor" type="tel" placeholder="0XX XXX XXXX" name="phone" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}">
                      </div>
                    </div>
                    
                    <div class="submitButtonWrapper more-button inversed mcol-xs-12">
                      <div class="more-button-wrapper">
                        <div class="more-button-container">
                          <button class="title semi-bold submitFormButton" type="submit">{{ __('main.send') }}</button>
                          <i class="icomoon standard-arrow-icon inversed"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow ">
                    <div class="formRow flex wrap top">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                       <label for="221">{{ __('main.additional_info') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <textarea id="221" class="border-decor" type="text" placeholder="" name="additional_info" data-validate="isShort" data-error-text="{{ __('main.message_length') }}"></textarea>
                      </div>
                    </div>
                  </div>

									<input type="hidden" name="type" value="antiques">
                </form>
              </div>

              <div id="clocks-tab" class="toggleBlock">
                <form id="clocks-form" action="#" class="standard-form calculate-form special_ability_form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6">
                    <div class="content-container">

                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="300">{{ __('main.watches_brand') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="300" data-placeholder="{{ __('main.not_chosen') }}" class="" name="clock_brand" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                            <option selected></option>
                            <option value="A.Lange and Sohne">A.Lange and Sohne</option>
                            <option value=" Armand Nicolet"> Armand Nicolet</option>
                            <option value="Arnold &amp; Son ">Arnold &amp; Son </option>
                            <option value="Auguste Reymond ">Auguste Reymond </option>
                            <option value="Audemars Piguet">Audemars Piguet</option>
                            <option value="Baume &amp; Mercier">Baume &amp; Mercier</option>
                            <option value="Bell &amp; Ross">Bell &amp; Ross</option>
                            <option value="Blancpain">Blancpain</option>
                            <option value="Bovet">Bovet</option>
                            <option value="Breguet">Breguet</option>
                            <option value="Breitling">Breitling</option>
                            <option value="Blu">Blu</option>
                            <option value="Bulgari">Bulgari</option>
                            <option value="Carl F. Bucherer">Carl F. Bucherer</option>
                            <option value="Cartier">Cartier</option>
                            <option value="Chanel">Chanel</option>
                            <option value="Chopard">Chopard</option>
                            <option value="Chronoswiss">Chronoswiss</option>
                            <option value="Corum">Corum</option>
                            <option value="Carrera y Carrera"></option>
                            <option value="Concord">Concord</option>
                            <option value="Daniel Roth">Daniel Roth</option>
                            <option value="De Bethune">De Bethune</option>
                            <option value="DeLaneau">DeLaneau</option>
                            <option value="Dubey&amp;Schaldenbrand">Dubey&amp;Schaldenbrand</option>
                            <option value="De Grisogono">De Grisogono</option>
                            <option value="Devon">Devon</option>
                            <option value="DeWitt">DeWitt</option>
                            <option value="Ebel">Ebel</option>
                            <option value="Eberhard &amp; Co">Eberhard &amp; Co</option>
                            <option value="Eterna">Eterna</option>
                            <option value="F. P. Journe">F. P. Journe</option>
                            <option value="Franc Vila">Franc Vila</option>
                            <option value="Franck Muller">Franck Muller</option>
                            <option value="Gerald Genta">Gerald Genta</option>
                            <option value="Girard Perregaux">Girard Perregaux</option>
                            <option value="Glashutte Original">Glashutte Original</option>
                            <option value="Graham">Graham</option>
                            <option value="Harry Winston">Harry Winston</option>
                            <option value="HD3">HD3</option>
                            <option value="Hublot">Hublot</option>
                            <option value="IWC">IWC</option>
                            <option value="Jacob and Co">Jacob and Co</option>
                            <option value="Jaeger LeCoultre">Jaeger LeCoultre</option>
                            <option value="Jaquet Droz">Jaquet Droz</option>
                            <option value="Jean Richard">Jean Richard</option>
                            <option value="Jorg Hysek">Jorg Hysek</option>
                            <option value="Kees Engelbarts">Kees Engelbarts</option>
                            <option value="Longines">Longines</option>
                            <option value="Louis Erard">Louis Erard</option>
                            <option value="Martin Braun">Martin Braun</option>
                            <option value="Maurice Lacroix">Maurice Lacroix</option>
                            <option value="Mont Blanc">Mont Blanc</option>
                            <option value="Officine Panerai">Officine Panerai</option>
                            <option value="Omega">Omega</option>
                            <option value="Parmigiani">Parmigiani</option>
                            <option value="Panerai">Panerai</option>
                            <option value="Pequignet">Pequignet</option>
                            <option value="Pierre Kunz">Pierre Kunz</option>
                            <option value="Patek Philipp">Patek Philipp</option>
                            <option value="Paul Picot">Paul Picot</option>
                            <option value="Perrelet">Perrelet</option>
                            <option value="Piaget">Piaget</option>
                            <option value="Pierre Kunz">Pierre Kunz</option>
                            <option value="Quinting">Quinting</option>
                            <option value="Rado">Rado</option>
                            <option value="Raymond Weil">Raymond Weil</option>
                            <option value="Roger Dubuis">Roger Dubuis</option>
                            <option value="Rolex">Rolex</option>
                            <option value="Romain Jerome">Romain Jerome</option>
                            <option value="Speake-Marin">Speake-Marin</option>
                            <option value="Svend Andersen">Svend Andersen</option>
                            <option value="Tag Heuer">Tag Heuer</option>
                            <option value="U-Boat">U-Boat</option>
                            <option value="Ulysse Nardin">Ulysse Nardin</option>
                            <option value="Urwerk">Urwerk</option>
                            <option value="Vacheron Constantin">Vacheron Constantin</option>
                            <option value="Van Cleef &amp; Arpels">Van Cleef &amp; Arpels</option>
                            <option value="Van Der Bauwede">Van Der Bauwede</option>
                            <option value="Zenith">Zenith</option>
                          </select>
                        </div>
                      </div>                     
                  
                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="302">{{ __('main.watches_model') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="302" class="border-decor" type="text" placeholder="" name="clock_model" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="303" class="">{{ __('main.watches_condition') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="303" data-placeholder="{{ __('main.not_chosen') }}" class="" name="clock_condition">
                            <option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="Новые">{{ __('main.new') }}</option>
                            <option value="БУ">БУ</option>
                            <option value="не исправные">{{ __('main.not_ok') }}</option>
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="303b" class="">{{ __('main.documents') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="303b" data-placeholder="{{ __('main.not_chosen') }}" class="" name="clock_docs">
                            <option value="Не выбрано">{{ __('main.not_chosen') }}</option>
                            <option value="Есть заполнены">{{ __('main.has_filled') }}</option>
                            <option value="Есть не заполнены">{{ __('main.has_not_filled') }}</option>
                            <option value="Нет">Нет</option>
                          </select>
                        </div>
                      </div>

                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="304">{{ __('main.watches_place') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="304" class="border-decor" type="text" placeholder="" name="clock_place">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow">
                    <div class="content-container ">
                     
                      <div class="title row-title">{{ __('main.original_box') }}</div>
                      	<div class="formRow customCheckboxContainer radioCircle flex ">
                        <div class="radioWrapper">
                          <input id="305a" type="radio" name="clock_original_package" class="" value="yes">
                          <label for="305a">
                            <span class="labelText">{{ __('main.there_is') }}</span>
                          </label>
                        </div>
                        <div class="radioWrapper">
                          <input id="305b" type="radio" name="clock_original_package" class="" value="no" checked>
                          <label for="305b">
                            <span class="labelText">{{ __('main.there_is_not') }}</span>
                          </label>
                        </div>
                      </div>

                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="306a" class="">{{ __('main.watches_date') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7 flex date-pick" >
                          <select id="306a" data-placeholder="01" class="" name="clock_day">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                           <option value="31">31</option>
                         </select>

                          <select id="306b" data-placeholder="январь" class="" name="clock_month">
                            <option value="Январь">{{ __('main.January') }}</option>
                            <option value="Февраль">{{ __('main.February') }}</option>
                            <option value="Март">{{ __('main.March') }}</option>
                            <option value="Апрель">{{ __('main.April') }}</option>
                            <option value="Май">{{ __('main.May') }}</option>
                            <option value="Июнь">{{ __('main.June') }}</option>
                            <option value="Июль">{{ __('main.July') }}</option>
                            <option value="Август">{{ __('main.August') }}</option>
                            <option value="Сентябрь">{{ __('main.September') }}</option>
                            <option value="Октябрь">{{ __('main.October') }}</option>
                            <option value="Ноябрь">{{ __('main.November') }}</option>
                            <option value="Декабрь">{{ __('main.December') }}</option>
                          </select>

                          <select id="306c" data-placeholder="1990" class="" name="clock_year">
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                          </select>
                        </div>
                      </div>

                      <div class="formRow flex wrap ">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="photoDropzone4">{{ __('main.upload_photo') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <div id="photoDropzone4" class="js_dropzone photoDropzone"></div>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  
                  <div class="mcol-xs-12 mcol-md-6 contentRow order-last last">
                    <div class="formRow flex wrap ">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="311">{{ __('main.your_name') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="311" class="border-decor" type="text" placeholder="" name="name" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="312">Ваш e-mail</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="312" class="border-decor" type="email" placeholder="" name="email">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="313">{{ __('main.your_phone') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="313" class="border-decor" type="tel" placeholder="0XX XXX XXXX" name="phone" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}">
                      </div>
                    </div>
                    
                    <div class="submitButtonWrapper more-button inversed mcol-xs-12">
                      <div class="more-button-wrapper">
                        <div class="more-button-container">
                          <button class="title semi-bold submitFormButton" type="submit">{{ __('main.send') }}</button>
                          <i class="icomoon standard-arrow-icon inversed"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow last">
                    <div class="formRow flex wrap top">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                       <label for="307">{{ __('main.additional_info') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <textarea id="307" class="border-decor" type="text" placeholder="" name="additional_info" data-validate="isShort" data-error-text="{{ __('main.message_length') }}"></textarea>
                      </div>
                    </div>
                  </div>

									<input type="hidden" name="type" value="watch">
                </form>
              </div>

              <div id="jewelry-tab" class="toggleBlock">
                <form id="jewelry-form" action="#" class="standard-form calculate-form special_ability_form flex wrap">

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6">
                    <div class="content-container">
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="401">{{ __('main.product_type') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="401" data-placeholder="{{ __('main.not_chosen') }}" class="" name="jewelry_type" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                            <option selected></option>
                            <option value="Кольцо">Кольцо</option>
                            <option value="Серьги">Серьги</option>
                            <option value="Подвес">Подвес</option>
                            <option value="Цепь">Цепь</option>
                            <option value="Браслет">Браслет</option>
                            <option value="Другое">Другое</option>
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="402">{{ __('main.product_brand') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="402" class="border-decor" type="text" placeholder="" name="jewelry_brand">
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="403" class="">{{ __('main.product_metal') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="403" data-placeholder="{{ __('main.not_chosen') }}" class="" name="jewelry_metal" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                            <option selected></option>
                            <option value="Платина">Платина</option>
                            <option value="Золото">Золото</option>
                            <option value="Палладий">Палладий</option>
                            <option value="Серебро">Серебро</option>
                          </select>
                        </div>
                      </div>
                  
                      <div class="formRow chosen-wrapper flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="403b" class="">{{ __('main.product_hallmark') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <select id="403b" data-placeholder="{{ __('main.not_chosen') }}" class="" name="jewelry_probe" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                            <option selected></option>
                            <option value="999/22k">999/24k</option>
                            <option value="958/23k">958/23k</option>
                            <option value="916/22k">916/22k</option>
                            <option value="875/21k">875/21k</option>
                            <option value="750/18k">750/18k</option>
                            <option value="585/14k">585/14k</option>
                            <option value="500/12k">500/12k</option>
                            <option value="416/10k">416/10k</option>
                            <option value="375/9k">375/9k</option>
                          </select>
                        </div>
                      </div>

                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="404">{{ __('main.product_weight') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="404" class="border-decor" type="text" placeholder="" name="jewelry_mass" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                        </div>
                      </div>

                      <div class="formRow flex wrap">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="408">{{ __('main.additions_character') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <input id="408" class="border-decor" type="text" placeholder="" name="jewelry_characteristics">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow">
                    <div class="content-container ">
                     
                      <div class="formRow customCheckboxContainer radioCircle flex ">
                        <div class="formBlock mcol-xs-12 mcol-sm-6 flex wrap">
                          <div class="title row-title mcol-xs-12">{{ __('main.original_package') }}</div>
                          <div class="flex">
                            <div class="radioWrapper">
                              <input id="405a" type="radio" name="jewelry_original_package" class="" value="yes">
                              <label for="405a">
                                <span class="labelText">{{ __('main.there_is') }}</span>
                              </label>
                            </div>
                            <div class="radioWrapper">
                              <input id="405b" type="radio" name="jewelry_original_package" class="" value="no" checked>
                              <label for="405b">
                                <span class="labelText">{{ __('main.there_is_not') }}</span>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="formBlock mcol-xs-12 mcol-sm-6">
                          <div class="title row-title mcol-xs-12">{{ __('main.documents') }}</div>
                          <div class="flex">
                            <div class="radioWrapper">
                              <input id="406a" type="radio" name="jewelry_documents" class="" value="yes">
                              <label for="406a">
                                <span class="labelText">{{ __('main.there_is') }}</span>
                              </label>
                            </div>
                            <div class="radioWrapper">
                              <input id="406b" type="radio" name="jewelry_documents" class="" value="no" checked>
                              <label for="406b">
                                <span class="labelText">{{ __('main.there_is_not') }}</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="formRow flex wrap ">
                        <div class="formBlock mcol-xs-12 mcol-sm-5">
                          <label for="photoDropzone5">{{ __('main.upload_photo') }}</label>
                        </div>
                        <div class="formBlock mcol-xs-12 mcol-sm-7">
                          <div id="photoDropzone5" class="js_dropzone photoDropzone"></div>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                  
                  <div class="mcol-xs-12 mcol-md-6 contentRow order-last last">
                    <div class="formRow flex wrap ">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="411">{{ __('main.your_name') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="411" class="border-decor" type="text" placeholder="" name="name" data-validate="required" data-error-text="{{ __('main.field_required') }}">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="412">Ваш e-mail</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="412" class="border-decor" type="email" placeholder="" name="email">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="413">{{ __('main.your_phone') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="413" class="border-decor" type="tel" placeholder="0XX XXX XXXX" name="phone" data-validate="required" data-error-text="{{ __('main.right_phone_required') }}">
                      </div>
                    </div>
                    
                    <div class="submitButtonWrapper more-button inversed mcol-xs-12">
                      <div class="more-button-wrapper">
                        <div class="more-button-container">
                          <button class="title semi-bold submitFormButton" type="submit">{{ __('main.send') }}</button>
                          <i class="icomoon standard-arrow-icon inversed"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 contentRow last">
                    <div class="formRow flex wrap top">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                       <label for="407">{{ __('main.additional_info') }}</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <textarea id="407" class="border-decor" type="text" placeholder="" name="additional_info" data-validate="isShort" data-error-text="{{ __('main.message_length') }}"></textarea>
                      </div>
                    </div>
                  </div>

									<input type="hidden" name="type" value="jewelry">
                </form>
              </div>

            </div>

          </div>

        </section>
    </div>
@endsection