<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>
        Поступила новая заявка на обратный звонок.
    </h3>
    {{--<a href="{{ $link }}">подтвердить e-mail</a>--}}
    {{--<p>Вы можете ее увидеть в разделе КАЛЬКУЛЯТОР админ панели сайта.</p>--}}
    <p>
    <table class="table table-striped">
        <tr>
            <td><strong>Имя</strong></td>
            <td>{{ $callback->name or 'не указано' }}</td>
        </tr>
        <tr>
            <td><strong>Телефон</strong></td>
            <td>{{ $callback->phone or 'не указано' }}</td>
        </tr>

    </table>
    </p>
</body>
</html>