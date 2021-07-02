<div class="section-mailing">
  <div class="daily-mailing-wrap flex">
    <div class="left-mailing-block flex">
      <h3 class="mailing-title">Ежедневная рассылка </h3>
      <p class="mailing-inform-text">
        отчета о выбывших с наличия товарах
        и поступивших на приход
      </p>
    </div>
    <div class="right-mailing-block">
      <form action="{{ route('subscription.send') }}" method="POST">
        @csrf
        <div class="inputs-submit-section flex">
          <div class="mailing-input @error('email') has-error @enderror">
            <input name="email" type="email" autocomplete="off" placeholder="Электронная почта">
            @error('email')
            <div class="help-block">{{ $message }}</div>
            @enderror
          </div>
          <div class="mailing-btn disabled-mail-btn">
            <button type="submit" disabled>Подписаться</button>
          </div>
        </div>
        <div class="agreement-section">
          <input type="checkbox" id="daily-mailing" maximum-scale="1.0" initial-scale="1.0">
          <label for="daily-mailing"></label>
          <span>Даю согласие на обработку <br> персональных данных</span>
        </div>
      </form>
    </div>
  </div>
</div>