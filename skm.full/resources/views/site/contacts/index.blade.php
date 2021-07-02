@extends('site.layouts.app')

@section('title', 'Контактная страница')

@section('content')

    <!-- Start of page code insertion here -->
    <div id="contactUsPage" class="contactUsPage page">
        <div class="page-container">

            <div class="page-content-container">
                <div class="mcontainer">

                   <div class="header-adresses">
                    @foreach($shops as $shop)
                        <div class="mcol-xs-12 mcol-sm-4 mcol-md-20 city-block">

                            <img class="img-city"
                                 src="{{ $shop->getMedia('images')->first() ? $shop->getMedia('images')->first()->getUrl() : '' }}"/> <!-- add-img -->
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

                    <div class="sectionBlock form-block">
                        <form action="{{ route('contacts.store') }}" method="post" class="form-container standard-form">
                            @csrf
                            <div class="title form-title">СВЯЗАТЬСЯ С НАМИ</div>

                            <div class="center text-center">
                            @if(count($errors))
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @elseif(session()->has('success'))
                                <div class="form-group">
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{{ session('success') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            </div>

                            <div class="formRow flex center">
                                <label class="mcol-xs-4 mcol-sm-2 required">Ваше имя</label>
                                <input name="name" type="text" class="mcol-xs-8 mcol-sm-10" required>
                            </div>

                            <div class="formRow flex center">
                                <label class="mcol-xs-4 mcol-sm-2 required">Ваша электронная почта</label>
                                <input name="email" type="email" class="mcol-xs-8 mcol-sm-10" required>
                            </div>

                            <div class="formRow flex center">
                                <label class="mcol-xs-4 mcol-sm-2 required">Сообщение</label>
                                <textarea name="message" class="mcol-xs-8 mcol-sm-10" rows="10" required></textarea>
                            </div>

                            <div class="submitButtonWrapper text-right">
                                <button type="submit" class="standardButton primary">Отправить</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        @include('site.includes.footer-nav-menu')
    </div>

    <!-- End of page code insertion here -->


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
