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
            <th>Email</th>
            <td>{{ $request->email }}</td>
        </tr>
        <tr>
            <th>Город</th>
            <td>{{ $request->city }}</td>
        </tr>
        <tr>
            <th>Отделение</th>
            <td>{{ $request->office }}</td>
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
            <th>Процессор</th>
            <td>{{ $request->cpu or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Обем оперативной памяти</th>
            <td>{{ $request->memory or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Жесткий диск</th>
            <td>{{ $request->hdd or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Видеокарта</th>
            <td>{{ $request->video or 'Не указано'}}</td>
        </tr>
        <tr>
            <th>Комплектация</th>
            <td>{{ $request->set }}</td>
        </tr>
        <tr>
            <th>Состояние</th>
            <td>{{ $request->condition }}</td>
        </tr>
        <tr>
            <th>Цена</th>
            <td>{{ $request->price }} грн</td>
        </tr>

    </table>
    </p>
</body>
</html>