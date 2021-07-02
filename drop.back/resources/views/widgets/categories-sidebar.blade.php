<div class="accordionMenu">
  <div class="menu-header">
    <div class="title-container">
      <div class="title medium">Каталог товаров</div>
    </div>
    <div class="arrow-button-container push-right accordionButton sidebarOpenButton">
      <i class="fas fa-bars"></i>
    </div>
  </div>
  <div class="hiddenContent height submenuWrapper mainSubmenuWrapper">
    <div class="content-container">
      <div class="submenu-list">
        @foreach($categories as $category)

          <div class="submenu-item">
            <div class="menu-item-container flex center">
              <div class="title-container">
                <div class="title section-title medium arrowdrop">
                  <a href="{{ route('products.index', ['categoryId' => $category->id]) }}">
                   <div class="relative">{{ $category->name }}
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
            <div class="hiddenContent submenuWrapper height">
              <div class="content-container">
                <div class="submenu-list">
                  @if($category->_subCategories)
                    @foreach($category->_subCategories as $subCategory)
                      <div class="submenu-item">

                        <div class="menu-item-container flex center">
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
                          @if($subCategory->_subCategories)
                            <div class="arrow-button-container push-right accordionButton">
                              {{-- <i class="fas fa-angle-right"></i>--}}
                            </div>
                          @endif
                        </div>

                        <div class="hiddenContent submenuWrapper height">
                          <div class="content-container">
                            <div class="submenu-list">
                              @if($subCategory->_subCategories)
                                @foreach($subCategory->_subCategories as $subSubCategory)

                                  <div class="submenu-item">
                                    <div class="menu-item-container flex center">
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
                                  </div>

                                @endforeach
                              @endif

                            </div>
                          </div>
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