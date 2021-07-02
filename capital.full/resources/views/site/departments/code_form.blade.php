@extends('site.layouts.app')

@section('content')
    <!-- Start of page code insertion here -->
    <div id="departmentPage" class="departmentPage page">

        <section class="pageSection white-bg">
            <div class="mcontainer">

                <div class="sectionBlock">
                    <form action="{{ route('departments.codes.download') }}" class="standard-form">
                        <div class="formRow flex justifyCenter">
                            <div class="formBlock mcol-xs-12 mcol-sm-4">
                                <input class="border-decor" type="number" name="office" placeholder="Введите номер отделения">
                            </div>
                            <div class="formBlock">
                                <div class="more-button inversed ">
                                  <div class="more-button-wrapper">
                                    <div class="more-button-container">
                                      <button type="submit" class="title semi-bold">Получить QR-коды</button>
                                      <i class="icomoon standard-arrow-icon inversed"></i>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if (\Session::has('code_error'))
                    <div class="sectionBlock">
                        <div class="description">
                            <p class="errorText text-center" style="color: red">{{ \Session::get('code_error') }}</p>
                        </div>
                    </div>
                @endif

            </div>
        </section>


    </div>

    <!-- End of page code insertion here -->
@endsection