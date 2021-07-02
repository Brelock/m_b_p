<div class="submenu-list">
    @foreach($categories as $category)
        <div class="submenu-item">
            <div class="menu-item-container flex center">
                <div class="title-container">
                    <div class="title section-title medium arrowdrop">
                        <a href="{{ route('categories.show', $category->slug) }}" class="">{{ $category->title }}</a>
                    </div>
                </div>

                @if($category->childs->count() > 0)
                    <div class="arrow-button-container push-right accordionButton">
                        <i class="fas fa-plus"></i>
                    </div>
                @endif
            </div>

            <div class="hiddenContent submenuWrapper height">
                <div class="content-container">
                    <div class="submenu-list">
                        @foreach($category->childs as $child)
                        <div class="submenu-item">
                            <div class="menu-item-container flex center">
                                <div class="title-container">
                                    <div class="title section-title medium"><a href="{{ route('categories.show', ['category' => $category->slug , 'subcategory' => $child->slug]) }}" class="">{{ $child->title }}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    @endforeach
</div>
