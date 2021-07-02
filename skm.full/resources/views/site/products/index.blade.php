@extends('site.layouts.app')

@section('title', $product->title )

@section('content')

    <!-- Start of page code insertion here -->
    <div id="productPage" class="productPage page">
        <div class="page-container">

            <div class="page-content-container">
                <div class="mcontainer">
                    <div class="sectionHeader sectionBlock opacityMobile">
                        <ul class="breadcrumbs sectionHeaderItem">
                            <li><a href="{{ route('main') }}"><i class="fas fa-home"></i></a></li>
                            <li><a href="{{ route('categories.show', $product->category->slug) }}"> {{ $product->category->title }} </a></li>
                            <li class="active"><a href="#">{{$product->title}}</a></li>
                        </ul>
                    </div>
 
                    <div class="flex wrap sectionBlock mobileCategory">
                      <div class="mcol-xs-12 mcol-sm-3 aside-part">
                       <aside id="sidebarMenu" class="aside-container category-sidebar descAccordion">
                       <div class="accordionMenu">
                        <div class="menu-header">
                            <div class="title-container">
                                <div class="title medium"><a href="#">Категории</a></div>
                            </div>

                            <div class="arrow-button-container push-right accordionButton sidebarOpenButton">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                        <div class="hiddenContent height submenuWrapper mainSubmenuWrapper">
                            <div class="content-container">
                                @include('site.categories._list')
                            </div>
                        </div>
                       </div>
                       </aside>
                      </div>
                     </div>


                    <div class="productSection sectionBlock pageSection">
                        <div class="section-container">
                            <div class="imgSliderBlock">
                                <div class="sectionBlock">
                                    <div id="productSlider" class="productSlider slider-wrapper popup_img_js">
                                   
                                       <div class="slide">
                                          <a class="single" href="{{ $product->getMedia('main_image')->first() ?
                                                         $product->getMedia('main_image')->first()->getUrl() :
                                                          asset('img/zaglushka.png') }}">
                                           <img src="{{ $product->getMedia('main_image')->first() ?
                                                         $product->getMedia('main_image')->first()->getUrl() :
                                                          asset('img/zaglushka.png') }}" alt="prod-img" class="prodImg">
                                          </a>
                                        </div>  
                                        @foreach($product->getMedia('images') as $image)
                                        <div class="slide">
                                          <a class="single" href="{{ $image->getUrl() }}">
                                           <img src="{{ $image->getUrl() }}" alt="prod-img" class="prodImg">
                                          </a>
                                        </div> 
                                        @endforeach

                                       {{-- <div class="slide">
                                            <img src="{{ $product->getMedia('main_image')->first() ?
                                                         $product->getMedia('main_image')->first()->getUrl() :
                                                          asset('img/zaglushka.png') }}" alt="prod-img" class="prodImg">
                                        </div> --}}
                                       {{-- @foreach($product->getMedia('images') as $image)
                                            <div class="slide">
                                                <img src="{{ $image->getUrl() }}" alt="prod-img" class="prodImg">
                                            </div>
                                        @endforeach --}}

                                    </div>
                                </div>

                                <div class="sectionBlock navSliderBlock">
                                    <div class="navSliderWrapper slider-wrapper">
                                        <div id="productSliderNav" class="nav-slider-container productSliderNav">
                                            <div class="slide">
                                                <img src="{{ $product->getMedia('main_image')->first() ?
                                                             $product->getMedia('main_image')->first()->getUrl() :
                                                              asset('img/zaglushka.png') }}" alt="prod-img" class="prodImg">
                                            </div>
                                            @foreach($product->getMedia('images') as $image)
                                                <div class="slide">
                                                    <img src="{{ $image->getUrl() }}" alt="prod-img" class="prodImg">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detailsBlock">
                                <div class="content-container bordered rounded">
                                    <div class="title section-title">{{ $product->title }}</div>
                                    @if( $product->price != null )
                                         <div class="sectionBlock">
                                            <div class="result-price">{{ $product->price }} грн.</div>
                                        </div> 
                                    @endif

                                </div>
                                <div class="pageSection description-section">
                            <div class="content-container">
                            <!-- <div class="productTabsBar tabsNav flex">
                                <div data-target="description-tab" class="tabButton active uppercase"
                                     data-tabs-group="productTab"
                                     data-tabs-container="productTabsContainer"><span>Описание</span>
                                </div>
                            </div> -->

                            <div class="toggleBlocks-list productTabsContainer bordered rounded fade-animation js_animate">
                                <div id="description-tab" class="toggleBlock productTab  active">
                                    <div class="description">
                                        <p>{!! nl2br($product->description) !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    @include('site.products._slide', ['title' => 'Популярные'])

                </div>
            </div>
        </div>

        @include('site.includes.footer-nav-menu')
    </div>

    <!-- End of page code insertion here -->

    <div class="scrollTopContainer">
        <div id="scrollTopButton" class="navigateIcon"></div>
    </div>
    </div>
    <!--  -->
    <div id="pageOverlay" class="pageOverlay"></div>
    <!--  -->
    <div id="popupOrder" class="popupOrder popup">
        <div class="popupWrapper">
            <div class="popupContentWrapper">

                <!-- <div class="modalHeader flex wrap relative">
                    <div class="icon-block">
                        <i class="icomoon icon-shopping_returns"></i>
                    </div>
                    <div class="modal-title title mcol-xs-12 mcol-sm-7">Returns & Exchanges Policy</div>
                    <button class="popupCloseButton" type="button"><i class="icomoon icon-delete"></i></button>
                </div>

                <div class="popUpContainer">
                    <div class="description">

                        <p class="description-title">StemarShoes.com Privacy Policy</p>
                        <p>We want you to be fully satisfied with your . You may return or exchange your order for 15 days from when your order arrived.</p>

                        <p>All returns/exchanges must be returned to StemarShoes.com in their original condition, in original packaging, including shoe dust covers and all tags. We do not guarantee wear or tear or any damage unrelated to the manufacturer. Shoes returned with any scratches or scuffs, or excessive creasing in the vamp will not be accepted.</p>

                    </div>
                </div> -->
            </div>
        </div>
    </div>

@endsection
