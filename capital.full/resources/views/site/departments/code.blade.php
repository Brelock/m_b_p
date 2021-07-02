<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr code</title>
    <style>
        html {
            margin: 0;
        }
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 0;
            margin: 0;
        }
        .container {
            width: 100%;
            position: relative;
        }
        .container h1 {
            z-index: 2;
            position: absolute;
            top: 485px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 42px;
            font-weight: bold;
            font-family: Calibri, DejaVu Sans, sans-serif;
        }
        .container img {
            z-index: 1;
            position: absolute;
        }

    </style>
</head>
<body>
    <div class="container">
        <img src="{{ $imageData }}" alt="" width="100%">
        <h1>{{ $officeAddress ?? '' }}</h1>
    </div>
</body>

</html>
