<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>

    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <h2>エラーメッセージ</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- 投稿表示エリア --}}
    @isset($bbs)
        @foreach ($bbs as $d)
            <h2>{{$d->name}} さんの直前のコメント</h2>
            {{ $d->comment }}
            <br><hr>
        @endforeach
    @endisset

    {{-- フォームエリア --}}
    <h2>フォーム</h2>
    <form action="/bbs" method="POST">
        名前：<br>
        <input name="name">
        <br>
        コメント：<br>
        <textarea name="comment" cols="40" rows="4"></textarea>
        <br>
        {{ csrf_field() }}
        <button class="btn btn-success"> 送信 </button>
    </form>
</body>
</html>
