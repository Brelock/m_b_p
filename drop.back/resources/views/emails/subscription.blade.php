<?php
/* @var App\Models\Subscription $subscription*/
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
          <td><strong>Email для рассылки</strong></td>
          <td>{{ $subscription->email }}</td>
        </tr>
      </table>
    </div>
  </body>
</html>