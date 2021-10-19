<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>掲示板</h1>

<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- 投稿表示エリア -->
@isset($posts)
    @foreach ($posts as $post)
        <h2>{{ $post->name }}さんの投稿</h2>
        {{ $post->content }}
        <a href="{{ route('posts.show', ['id' => $post->id]) }}">コメント</a>
        <br><hr>
    @endforeach
@endisset

<!-- フォームエリア -->
<h2>フォーム</h2>
<form action="posts" method="POST">
    名前:<br>
    <input name="name">
    <br>
    内容:<br>
    <textarea name="content" rows="4" cols="40"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>
