<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>
        Поступила новая заявка на оценку залога
    </h3>
    {{--<a href="{{ $link }}">подтвердить e-mail</a>--}}
    <p>Вы можете ее увидеть в разделе КАЛЬКУЛЯТОР админ панели сайта.</p>
    <p>
        <table class="table">
        <tr>
            <td><strong>Имя</strong></td>
            <td>{{ $request->name }}</td>
        </tr>
        <tr>
            <td><strong>Телефон</strong></td>
            <td>{{ $request->phone }}</td>
        </tr>
        <tr>
            <td><strong>Категория</strong></td>
            <td>@if($category) {{ $category[0]['title_ru'] }} @else Нет категории @endif</td>
        </tr>
        <tr>
            <td><strong>Вес</strong></td>
            <td>{{ $request->weight }}</td>
        </tr>
        <tr>
            <td><strong>Проба</strong></td>
            <td>{{ $hallmark[0]['hallmark']}}</td>
        </tr>
        <tr>
            <td><strong>Камень</strong></td>
            <td>
                @if($request->stone == 1)
                    Есть
                @else
                    Нет
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Отдление</strong></td>
            <td>@if($tariff) Отдление №{{ $tariff[0]['number'] }}, г. {{ $tariff[0]['city']['title_ru'] }} , {{ $tariff[0]['address_ru'] }} @else Нет отдления @endif</td>
        </tr>
        <tr>
            <td><strong>Статус</strong></td>
            <td>@if($status) {{ $status[0]['title_ru'] }} @else Нет статуса @endif</td>
        </tr>
        <tr>
            <td><strong>Срок</strong></td>
            <td>{{ $request->term }}</td>
        </tr>
        <tr>
            <td><strong>Сумма</strong></td>
            <td>{{ number_format($request->amount, 3) }} грн</td>
        </tr>
        <tr>
            <td><strong>Переплата</strong></td>
            <td>{{ number_format($request->overpayment, 3) }} грн</td>
        </tr>
    </table>
    </p>
</body>
</html>