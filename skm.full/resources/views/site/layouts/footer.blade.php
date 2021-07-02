<footer class="mainFooter">
    <div class="top-footer">
        <div class="mcontainer">
            <div class="mrow flex justifyCenter wrap">
                @foreach($shops as $shop)
                    <div class="mcol-xs-12 mcol-sm-4 mcol-md-20">
                        <div class="col-content-container">
                            <div class="title article-title bold">{{ $shop->city }}</div>

                            <ul class="contacts-list">
                                
                                @if($shop->phone != null)
                                    <li class="contact-item">
                                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                        <div class="item-content">
                                            <p>{{ $shop->phone }}</p>
                                        </div>
                                    </li>
                                @endif
                                
                                @if($shop->address != null)
                                <li class="contact-item">
                                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="item-content">
                                        <p>{{ $shop->address }}</p>
                                    </div>
                                </li>
                                @endif

                                @if($shop->email != null)
                                    <li class="contact-item">
                                        <div class="icon"><i class="fas fa-envelope"></i></div>
                                        <div class="item-content">
                                            <p><a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a></p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="bottom-footer text-center">
		<div class="mcontainer">
			<a class="bottom-footer-link flex justifyCenter" href="https://zengineers.company/" target="_blanc">
				Разработано в 
				<img class="bottom-footer-img" src="/img/Z_logo.svg" alt="">
			</a>
		</div>
	</div>
</footer>
