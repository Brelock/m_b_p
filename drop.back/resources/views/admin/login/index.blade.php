@extends('admin.layouts.app')

@section('content')
  <div id="authPage" class="bgc-gray">
    <form class="form-registr" @submit.prevent="submitLogin($event)">
      <div class="title-form">Авторизация</div>

      <div class="general-errors" v-text="getErrorMessage(loginErrors, 'messages')"></div>

      <div class="form-group">
        <div :class="{ 'has-error': hasError(loginErrors, 'email') }">
          <label for="exampleInputEmail1"></label>
          <input type="email"
                 class="form-input-mail"
                 placeholder="Электронная почта"
                 id="exampleInputEmail1"
                 aria-describedby="emailHelp"
                 v-model="loginAttributes.email" />

          <div class="help-block" v-text="getErrorMessage(loginErrors, 'email')"></div>
        </div>

        <div :class="{ 'has-error': hasError(loginErrors, 'password') }">
          <label for="exampleInputPassword1"></label>
          <input type="password"
                 class="form-input"
                 placeholder="Пароль"
                 id="exampleInputPassword1"
                 v-model="loginAttributes.password" />

          <div class="help-block" v-text="getErrorMessage(loginErrors, 'password')"></div>
        </div>
      </div>

      <div class="buttons-form">
        <button type="submit" class="btn btn-primary admin-exit">
          <span v-if="!loginProcess">Войти</span>
          <span v-else>Попытка входа...</span>
        </button>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ \EscapeWork\Assets\Facades\Asset::v('js/login.js') }}"></script>
@endsection