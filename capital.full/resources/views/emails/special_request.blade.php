<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>
        Поступила новая заявка на оценку залога по спецвозможностям
    </h3>
    {{--<a href="{{ $link }}">подтвердить e-mail</a>--}}
    <p>Вы можете ее увидеть в разделе КАЛЬКУЛЯТОР админ панели сайта.</p>
    <p>
    <table class="table table-striped">
        <tr>
            <td><strong>Имя</strong></td>
            <td>{{ $request->name or 'не указано' }}</td>
        </tr>
        <tr>
            <td><strong>Телефон</strong></td>
            <td>{{ $request->phone or 'не указано' }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $request->email or 'не указано' }}</td>
        </tr>

        @include('admin.calculator.calc_specials._'.$request->type)

    </table>
    </p>
</body>
</html>