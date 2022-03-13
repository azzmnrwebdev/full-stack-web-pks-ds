<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Saudara/i {{ $comment->post->user->name }} artikel Anda yang berjudul "{{ $comment->post->title }}" telah
    dikomentari oleh
    {{ $comment->user->name }}.
</body>

</html>
