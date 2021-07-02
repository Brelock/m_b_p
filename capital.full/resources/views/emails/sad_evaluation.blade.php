<!doctype html>
<html>
<head>
  <title></title>
</head>
<body>
<h3>
  Поступил новый плохой отзыв на отделение {{ $evaluation->office->number }}
</h3>
<p>
<table class="table">
  <tr>
    <td><strong>Комментарий</strong></td>
    <td>{{ $evaluation->comment }}</td>
  </tr>
  <tr>
    <td><strong>Телефон</strong></td>
    <td>{{ $evaluation->phone }}</td>
  </tr>
  <tr>
    <td><strong>Дата</strong></td>
    <td>{{ $evaluation->created_at->format('d.m.Y H:i') }}</td>
  </tr>
</table>
</p>
</body>
</html>