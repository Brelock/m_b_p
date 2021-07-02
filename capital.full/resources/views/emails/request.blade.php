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
            <td><strong>Email</strong></td>
            <td>{{ $request->email }}</td>
        </tr>
        <tr>
            <td><strong>Город</strong></td>
            <td>{{ $request->city }}</td>
        </tr>
        <tr>
            <td><strong>Категория</strong></td>
            <td>{{ $request->category }}</td>
        </tr>
        <tr>
            <td><strong>Вес</strong></td>
            <td>{{ $request->weight }}</td>
        </tr>
        <tr>
            <td><strong>Проба</strong></td>
            <td>{{ $request->hallmark }}</td>
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
            <td><strong>Тариф</strong></td>
            <td>{{ $request->tariff }}</td>
        </tr>
        <tr>
            <td><strong>Статус</strong></td>
            <td>{{ $request->client_status }}</td>
        </tr>
        <tr>
            <td><strong>Срок</strong></td>
            <td>{{ $request->term }}</td>
        </tr>
        <tr>
            <td><strong>Сумма</strong></td>
            <td>{{ $request->amount }} грн</td>
        </tr>
        <tr>
            <td><strong>Переплата</strong></td>
            <td>{{ $request->overpayment }} грн</td>
        </tr>
    </table>
    </p>
</body>
</html>