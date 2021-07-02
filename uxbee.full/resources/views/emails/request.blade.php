<!doctype html>
<html>
  <head>
      <title>New request</title>
  </head>
  <body>
    <h3>
      New request received
    </h3>
    <div>
      <table class="table">
        <tr>
          <td><strong>Name</strong></td>
          <td>{{ $request->name }}</td>
        </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td>{{ $request->email }}</td>
        </tr>
        <tr>
          <td><strong>Question</strong></td>
          <td>{{ $request->question }}</td>
        </tr>

      </table>
    </div>
  </body>
</html>