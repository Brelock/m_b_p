<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
<h3>
    Оставлен новый комментарий
</h3>
{{--<a href="{{ $link }}">подтвердить e-mail</a>--}}
{{--<p>Вы можете ее увидеть в разделе КАЛЬКУЛЯТОР админ панели сайта.</p>--}}
<p>
<table class="table table-striped">
    <tr>
        <td><strong>Имя</strong></td>
        <td>{{ $feedback->name or 'не указано' }}</td>
    </tr>
    <tr>
        <td><strong>Телефон</strong></td>
        <td>{{ $feedback->phone or 'не указано' }}</td>
    </tr>
    <tr>
        <td><strong>Город</strong></td>
        <td>{{ $feedback->city or 'не указано' }}</td>
    </tr>
    <tr>
        <td><strong>Сообщение</strong></td>
        <td>{{ $feedback->body or 'не указано' }}</td>
    </tr>
</table>
</p>
</body>
</html>