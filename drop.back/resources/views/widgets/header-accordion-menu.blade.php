<div class="header-accordion-menu">
    <div class="btn-title-container">Каталог товаров</div>
    <div class="header-accordion">
      <div class="absolute-header-accordion">
        <div class="content-container">
          <div class="submenu-list">
            @foreach($categories as $category)

              <div class="submenu-item menu-categories__item ">
                <div class="menu-item-container flex center">
                  <div class="title-container">
                    <div class="title section-title medium arrowdrop">
                      <a href="{{ route('products.index', ['categoryId' => $category->id]) }}">
                        <div class="relative">
                          {{ $category->name }}
                          <span class="number-items">{{ $category->_totalProducts }}</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  @if($category->_subCategories)
                   <div class="arrow-button-container push-right accordionButton">
                      {{-- <i class="fas fa-angle-right"></i> --}}
                    </div> 
                  @endif
                </div>
                <div class="submenuWrapper height">
                  <div class="content-container">
                    <div class="submenu-list inside-submenu-list">
                      @if($category->_subCategories)
                        @foreach($category->_subCategories as $subCategory)
                          <div class="submenu-item">

                          
                              <div class="title-container">
                                <div class="title medium arrowdrop">
                                  <a href="{{ route('products.index', ['categoryId' => $subCategory->id]) }}">
                                    <div class="relative">
                                      {{ $subCategory->name }}
                                       <span class="number-items">{{ $subCategory->_totalProducts }}</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                     
                                <div class="submenu-list">
                                  @if($subCategory->_subCategories)
                                    @foreach($subCategory->_subCategories as $subSubCategory)

                                      <div class="submenu-item">  
                                          <div class="title-container">
                                            <div class="title medium arrowdrop">
                                              <a href="{{ route('products.index', ['categoryId' => $subSubCategory->id]) }}">
                                                <div class="relative">
                                                  {{ $subSubCategory->name }}
                                                  <span class="number-items">{{ $subSubCategory->_totalProducts }}</span>
                                                </div>
                                              </a>
                                            </div>
                                          </div>
                                      </div>

                                    @endforeach
                                  @endif

                                </div>

                          </div>
                        @endforeach
                      @endif
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