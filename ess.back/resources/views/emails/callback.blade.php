<?php
use App\Enums\CallbacksType;
/* @var App\Models\Callback $callback*/
?>

<!doctype html>
<html>
  <head>
      <title>Навая заявка</title>
  </head>
  <body>
    <h3>
      Получена новая заявка
    </h3>
    <p>Вы можете увидеть это в разделе ЗАЯВКИ админ-панели сайта.</p>
    <div>
      <table class="table">
        <tr>
          <td><strong>Имя пользователя</strong></td>
          <td>{{ $callback->name ?: 'Не указано' }}</td>
        </tr>
        <tr>
          <td><strong>Номер телефона для обратной связи</strong></td>
          <td>{{ $callback->phone ?: 'Не указан' }}</td>
        </tr>
        <tr>
          <td><strong>Email для обратной связи</strong></td>
          <td>{{ $callback->email ?: 'Не указан' }}</td>
        </tr>
        <tr>
        <tr>
          <td><strong>Регион</strong></td>
          <td>{{ $callback->region ?: 'Не указан' }}</td>
        </tr>
        <tr>
          <td><strong>Текст запроса</strong></td>
          <td>{{ $callback->message ?: 'Отсутствует' }}</td>
        </tr>
        <tr>
          <td><strong>Тип заявки</strong></td>
          <td>{{ CallbacksType::$LABELS[$callback->type] }}</td>
        </tr>
      </table>
    </div>
  </body>
</html>