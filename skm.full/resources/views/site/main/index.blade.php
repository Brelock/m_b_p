@extends('site.layouts.app')

@section('content')
<!-- Start of page code insertion here -->
<div id="homePage" class="homePage page">
    <div class="page-container">
        <div class="mcontainer">
            <div class="aside-container">
                <aside class="category-sidebar mcol-xs-12 mcol-md-3 absolutePosition descMenu">
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

        <div class="page-content-container mcol-xs-12">
            <div class="mainSliderSection slider-wrapper pageSection theme-default relative">
                <div id="mainSlider" class="mainSlider nivoSlider">
                    @foreach($slides as $slide)
                        @if($slide->url == null)
                            <img class="imageResponsive" alt="banner"
                                 src="{{ $slide->getMedia('images')->first() ?
                                         $slide->getMedia('images')->first()->getUrl() :
                                          asset('img/zaglushka.png') }}" alt="prod-img"  >
                        @else
                            <a href="{{ $slide->url }}" class="nivo-imageLink">
                                <img class="imageResponsive" alt="banner"
                                 src="{{ $slide->getMedia('images')->first() ?
                                         $slide->getMedia('images')->first()->getUrl() :
                                          asset('img/zaglushka.png') }}" alt="prod-img"  >
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            @include('site.products._slide', ['products' => $popularProducts, 'title' => 'Популярные'])

            @include('site.products._slide', ['products' => $newestProducts, 'title' => 'Новинки'])

            <div class="pageSection brands-slider-section">
                <div class="mcontainer">
                    <div class="content-container">
                        <div id="brandsSlider" class="brandsSlider slider-wrapper">
                            @foreach($brand->getMedia('images') as $image)
                                <div class="slide">
                                    <img src="{{ $image->getUrl() }}" alt="prod-img" class="prodImg">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
