<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>
        Поступила новая заявка на оценку техники
    </h3>
    {{--<a href="{{ $link }}">подтвердить e-mail</a>--}}
    <p>Вы можете ее увидеть в разделе КАЛЬКУЛЯТОР админ панели сайта.</p>
    <p>
        <table class="table table-striped">
        <tr>
            <th>Имя</th>
            <td>{{ $request->name }}</td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td>{{ $request->phone }}</td>
        </tr>
        <tr>
            <th>Категория</th>
            <td>{{ $request->category }}</td>
        </tr>

        <tr>
            <th>Бренд</th>
            <td>{{ $request->brand  or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Модель</th>
            <td>{{ $request->model  or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Комплектация</th>
            <td>{{ $request->set }}</td>
        </tr>
        <tr>
            <th>Состояние</th>
            <td>{{ $request->condition }}</td>
        </tr>

    </table>
    </p>
</body>
</html>