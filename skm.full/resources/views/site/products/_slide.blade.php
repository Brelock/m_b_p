<div class="pageSection featured-slider-section">
    <div class="mcontainer">
        <div class="content-container">
            <div class="title-block">
                <div class="decor-icon">
                    <img src="/img/title-divider.png" alt="icon">
                </div>
                <h3 class="title section-title bold uppercase">{{ $title ?? '' }}</h3>
            </div>

            <div id="featuredSlider" class="ourProductsSlider featuredSlider slider-wrapper">
                @foreach($products as $product)
                    <div class="product-card slide">
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
                                </div>

                            </div>

                            <div class="content-block">
                                <div class="product-title"><a href="#">{{ $product->title }}</a></div>
                                @if( $product->price != null )
                                    <div class="price">
                                        <span>{{$product->price}} грн.</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
