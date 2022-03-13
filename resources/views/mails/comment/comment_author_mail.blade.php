<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Saudara/i {{ $comment->user->name }} , komentar Anda yang berisi : "{{ $comment->content }}" , yang ditujukan
    kepada {{ $comment->post->user->name }}, telah berhasil di submit.
</body>

</html>
