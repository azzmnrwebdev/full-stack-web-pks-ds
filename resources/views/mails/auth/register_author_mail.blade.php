<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Selamat Datang di {{ config('app.name') }}. Ini adalah kode OTP Anda : {{ $user->otp_code->otp }}.
    Kode OTP ini berlaku
    5
    menit. Jangan berikan kode ini kepada siapapun.
</body>

</html>
