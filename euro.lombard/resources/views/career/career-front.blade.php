@extends('layouts.index')

@section('content')

<div class="mcontainer">
  <div class="breadcrumbs">
    <ul class="breadcrumbs-wrap">
      <li class="breadcrumbs-link"><a href="{{ route('main') }}">Головна</a></li>
       <span class="icon-bg-line"></span>
      <li class="breadcrumbs-link active-link">Кар'єра</li>
    </ul>
  </div>
  <div class="title visible-viewportchecker visibility--check hidden">Кар'єра</div>
</div>

<section class="preview-banner">
  <div class="mcontainer">
    <div class="banner visible-viewportchecker visibility--check hidden">
      <img src="/img/career-banner.png" alt="">
    </div>
    <div class="sup-title visible-viewportchecker visibility--check hidden">
      <p> «Євроломбард» - це Компанія, яка впевнена, що найважливішим фактором її успіху є співробітники.</p>
      <p> Завдяки їх досвіду і компетентності «Капітал» займає лідируючу позицію на ринку України, і саме 
          тому в першу чергу завжди піклується про свій персонал.</p>
    </div>
    <div class="description-list-career">

      <p class="important-info visible-viewportchecker visibility--check hidden">Всім своїм працівникам «Капітал» гарантує:</p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Гідну заробітну плату, вищу за ринкову по Україні;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Офіційне оформлення з першого робочого дня згідно КЗпП;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Соціальна підтримка: матеріальні виплати та премії;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Робоче місце в зручному розташуванні від будинку;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Безкоштовне навчання та підтримка у процесі роботи;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Реальне кар'єрне зростання;
      </p>

      <p class="visible-viewportchecker visibility--check hidden">
        <span class="icon-bg-line"></span>
        Чесність по відношенню до своїх працівників.
      </p>

    </div>
  </div>
</section>

<section class="vacancies-form">
  <div class="mcontainer">
    <div class="common-questions-wrap-list shell-form">
      <div class="title visible-viewportchecker visibility--check hidden">Перечень вакансій Компанії України</div>

      <div class="questions-item visible-viewportchecker visibility--check hidden">
        <div class="header-item vacancies-header">
          <div class="name-vacancies">Касир-оцінювач</div>
          <div class="region-vacancies">Бердянськ</div>
          <div class="rate-vacancies">12 000 грн</div>

        </div>
        <div class="info-drop-questions">
          <p>Євроломбард — це мережа ломбардів, яка є надійним роботодавцем і з турботою ставиться до своїх співробітників і клієнтів.</p>
          <p>У зв 'язку з розвитком компанії, оголошуємо конкурс на вакансію «помічник регіонального менеджера».</p>

          <p class="important-info">Вимоги:</p>
          <p>
            <span class="icon-bg-line"></span>
            чоловік від 25 до 35 років;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            вища освіта;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            досвід роботи від 2-х років на аналогічній посаді;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            впевнений користувач ПК, знання касової дисципліни;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            організаторські здібності та аналітичний склад розуму;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            наявність водійського посвідчення категорії «В», стаж від 2-х років.
          </p>


          <p class="important-info">Обов 'язки:</p>
          <p>
            <span class="icon-bg-line"></span>
            ведення обліку, здійснення закупок по всім витратним матеріалам;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            збір та своєчасна розсилка посилок з кур'єрських служб на склад або офіс;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            контроль та організація питань з корпоративного проживання співпрацівників компанії;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            ведення та контроль графіків по всім відділенням.
          </p>


          <p class="important-info">Умови роботи:</p>
          <p>
            <span class="icon-bg-line"></span>
            гідна заробітна плата;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіс у центрі міста;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            графік роботи: 5/2 з 8:00 до 17:00;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіційне працевлаштування;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            можливість кар'єрного зросту;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            молодий та дружний колектив.
          </p>

          <p class="sub-description">Якщо Вас, зацікавила дана вакансія — відправляйте розгорнуте резюме до розгляду!</p>
          <p class="sub-description">Будемо раді бачити Вас, в нашій команді!</p>

        <div class="get-summary">
          <label>
            <input type="file" multiple placeholder="Вiдправити резюме">
            <span>Вiдправити резюме</span>
          </label>
        </div>
        </div>
        <div class="icon-wrap-block">
          <span class="icon-questions-plus"></span>
        </div>
      </div>
      <div class="questions-item visible-viewportchecker visibility--check hidden">
        <div class="header-item vacancies-header">
          <div class="name-vacancies">Регіональний менеджер</div>
          <div class="region-vacancies">Запорiжжя</div>
          <div class="rate-vacancies">25 000 грн</div>

        </div>
        <div class="info-drop-questions">
          <p>Євроломбард — це мережа ломбардів, яка є надійним роботодавцем і з турботою ставиться до своїх співробітників і клієнтів.</p>
          <p>У зв 'язку з розвитком компанії, оголошуємо конкурс на вакансію «помічник регіонального менеджера».</p>

          <p class="important-info">Вимоги:</p>
          <p>
            <span class="icon-bg-line"></span>
            чоловік від 25 до 35 років;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            вища освіта;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            досвід роботи від 2-х років на аналогічній посаді;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            впевнений користувач ПК, знання касової дисципліни;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            організаторські здібності та аналітичний склад розуму;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            наявність водійського посвідчення категорії «В», стаж від 2-х років.
          </p>


          <p class="important-info">Обов 'язки:</p>
          <p>
            <span class="icon-bg-line"></span>
            ведення обліку, здійснення закупок по всім витратним матеріалам;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            збір та своєчасна розсилка посилок з кур'єрських служб на склад або офіс;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            контроль та організація питань з корпоративного проживання співпрацівників компанії;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            ведення та контроль графіків по всім відділенням.
          </p>


          <p class="important-info">Умови роботи:</p>
          <p>
            <span class="icon-bg-line"></span>
            гідна заробітна плата;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіс у центрі міста;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            графік роботи: 5/2 з 8:00 до 17:00;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіційне працевлаштування;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            можливість кар'єрного зросту;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            молодий та дружний колектив.
          </p>

          <p class="sub-description">Якщо Вас, зацікавила дана вакансія — відправляйте розгорнуте резюме до розгляду!</p>
          <p class="sub-description">Будемо раді бачити Вас, в нашій команді!</p>

        <div class="get-summary">
          <label>
            <input type="file" multiple placeholder="Вiдправити резюме">
            <span>Вiдправити резюме</span>
          </label>
        </div>
        </div>
        <div class="icon-wrap-block">
          <span class="icon-questions-plus"></span>
        </div>
      </div>
      <div class="questions-item visible-viewportchecker visibility--check hidden">
        <div class="header-item vacancies-header">
          <div class="name-vacancies">Помічник регіонального менеджера</div>
          <div class="region-vacancies">Запорiжжя</div>
          <div class="rate-vacancies">15 000 грн</div>

        </div>
        <div class="info-drop-questions">
          <p>Євроломбард — це мережа ломбардів, яка є надійним роботодавцем і з турботою ставиться до своїх співробітників і клієнтів.</p>
          <p>У зв 'язку з розвитком компанії, оголошуємо конкурс на вакансію «помічник регіонального менеджера».</p>

          <p class="important-info">Вимоги:</p>
          <p>
            <span class="icon-bg-line"></span>
            чоловік від 25 до 35 років;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            вища освіта;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            досвід роботи від 2-х років на аналогічній посаді;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            впевнений користувач ПК, знання касової дисципліни;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            організаторські здібності та аналітичний склад розуму;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            наявність водійського посвідчення категорії «В», стаж від 2-х років.
          </p>


          <p class="important-info">Обов 'язки:</p>
          <p>
            <span class="icon-bg-line"></span>
            ведення обліку, здійснення закупок по всім витратним матеріалам;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            збір та своєчасна розсилка посилок з кур'єрських служб на склад або офіс;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            контроль та організація питань з корпоративного проживання співпрацівників компанії;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            ведення та контроль графіків по всім відділенням.
          </p>


          <p class="important-info">Умови роботи:</p>
          <p>
            <span class="icon-bg-line"></span>
            гідна заробітна плата;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіс у центрі міста;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            графік роботи: 5/2 з 8:00 до 17:00;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіційне працевлаштування;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            можливість кар'єрного зросту;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            молодий та дружний колектив.
          </p>

          <p class="sub-description">Якщо Вас, зацікавила дана вакансія — відправляйте розгорнуте резюме до розгляду!</p>
          <p class="sub-description">Будемо раді бачити Вас, в нашій команді!</p>

        <div class="get-summary">
          <label>
            <input type="file" multiple placeholder="Вiдправити резюме">
            <span>Вiдправити резюме</span>
          </label>
        </div>
        </div>
        <div class="icon-wrap-block">
          <span class="icon-questions-plus"></span>
        </div>
      </div>
      <div class="questions-item visible-viewportchecker visibility--check hidden">
        <div class="header-item vacancies-header">
          <div class="name-vacancies">Касир-оцінювач</div>
          <div class="region-vacancies">Кам’янка-Днiпровська</div>
          <div class="rate-vacancies"></div>

        </div>
        <div class="info-drop-questions">
          <p>Євроломбард — це мережа ломбардів, яка є надійним роботодавцем і з турботою ставиться до своїх співробітників і клієнтів.</p>
          <p>У зв 'язку з розвитком компанії, оголошуємо конкурс на вакансію «помічник регіонального менеджера».</p>

          <p class="important-info">Вимоги:</p>
          <p>
            <span class="icon-bg-line"></span>
            чоловік від 25 до 35 років;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            вища освіта;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            досвід роботи від 2-х років на аналогічній посаді;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            впевнений користувач ПК, знання касової дисципліни;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            організаторські здібності та аналітичний склад розуму;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            наявність водійського посвідчення категорії «В», стаж від 2-х років.
          </p>


          <p class="important-info">Обов 'язки:</p>
          <p>
            <span class="icon-bg-line"></span>
            ведення обліку, здійснення закупок по всім витратним матеріалам;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            збір та своєчасна розсилка посилок з кур'єрських служб на склад або офіс;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            контроль та організація питань з корпоративного проживання співпрацівників компанії;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            ведення та контроль графіків по всім відділенням.
          </p>


          <p class="important-info">Умови роботи:</p>
          <p>
            <span class="icon-bg-line"></span>
            гідна заробітна плата;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіс у центрі міста;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            графік роботи: 5/2 з 8:00 до 17:00;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            офіційне працевлаштування;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            можливість кар'єрного зросту;
          </p>
          <p>
            <span class="icon-bg-line"></span>
            молодий та дружний колектив.
          </p>

          <p class="sub-description">Якщо Вас, зацікавила дана вакансія — відправляйте розгорнуте резюме до розгляду!</p>
          <p class="sub-description">Будемо раді бачити Вас, в нашій команді!</p>

        <div class="get-summary">
          <label>
            <input type="file" multiple placeholder="Вiдправити резюме">
            <span>Вiдправити резюме</span>
          </label>
        </div>
        </div>
        <div class="icon-wrap-block">
          <span class="icon-questions-plus"></span>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="career-callback-form visible-viewportchecker visibility--check hidden">
  <div class="mcontainer">
    @include('includes.callback-questions-form-front')
  </div>
</section>

@endsection




