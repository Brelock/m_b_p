@extends('site.layouts.app')

@section('title', $category->title )

@section('content')

    <!-- Start of page code insertion here -->
    <div id="categoryPage" class="categoryPage page">
        <div class="page-container">
            <div class="mcontainer">

                <div class="sectionHeader sectionBlock opacityMobile">
                    <ul class="breadcrumbs sectionHeaderItem">
                        <li><a href="{{ route('main') }}"><i class="fas fa-home"></i></a></li>
                        <li class="active"><a href="#">{{$category->title}}</a></li>
                    </ul>
                </div>

                <div class="flex wrap sectionBlock">
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

                    <div class="mcol-xs-12 mcol-sm-9 content-part">
                        <div class="page-content-container">
                            <div class="sectionHeader sectionBlock rounded flex">
                                <h1 class="title category-page-title uppercase">{{ $category->title }}</h1>
                                <!-- <div class="sectionBlock sectionHeader sortbarBlock rounded"> -->
                                <div class="sortbar-container flex wrap center">
                                    <div class="aligmentButtons">
                                        <div class="button-item">
                                            <i class="button link fas fa-th-large active" data-aligment="js_aligmentGrid"></i>
                                        </div>
                                        <div class="button-item">
                                            <i class="button link fas fa-th-list" data-aligment="js_aligmentList"></i>
                                        </div>
                                    <!-- </div> -->

                                    <!-- <div class="">
                                        <a href="#" class="link">Список продуктов ({{ $category->products->count() }})</a>
                                    </div> -->

                                </div>
                            </div>
                            </div>



                            <div class="sectionBlock">
                                <div id="itemsList" class="products-list list-top-animation">

                                    <div class="mrow flex wrap">
{{--                                        @foreach($category->products as $product)--}}
                                        @foreach($products as $product)
                                        <div class="product-card mcol-xs-12 mcol-xsm-6 mcol-md-4">
                                            <div class="product-card-container">
                                                <div class="image-block">
                                                    <a href="{{ route('products.show', $product->slug) }}" class="img-link"></a>
                                                    <div class="imgWrapper">
                                                        <img src="{{ $product->getMedia('main_image')->first() ?
                                                                     $product->getMedia('main_image')->first()->getUrl() :
                                                                      asset('img/zaglushka.png') }}" alt="prod-img" class="prodImg startImg">

                                                        <img src="{{ $product->getMedia('images')->first() ?
                                                                     $product->getMedia('images')->first()->getUrl() :
                                                                      asset('img/zaglushka.png') }}" alt="prod-img" class="prodImg hiddenImg">
                                                        {{--<img src="/img/catalog/product2.jpg" alt="prod-img" class="prodImg startImg">
                                                        <img src="/img/catalog/product3.jpg" alt="prod-img" class="prodImg hiddenImg">      --}}
                                                    </div>
                                                </div>

                                                <div class="content-block">
                                                    <div class="product-title"><a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></div>
                                                    @if( $product->price != null )
                                                        <div class="price">
                                                            <span>{{ $product->price }} грн.</span>
                                                        </div>
                                                    @endif

                                                    <div class="description description-block">
                                                        <p>{{ $product->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
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
