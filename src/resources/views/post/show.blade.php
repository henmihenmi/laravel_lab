<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>掲示板</h1>
<a href="{{ route('posts.index') }}">戻る</a>

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
<h2>名前： {{ $post->name }}</h2>
<p>{{ $post->content }}</p>
<br><hr>

{{-- コメント表示エリア --}}
@isset($comments)
    <h2>コメント一覧</h2>
    @foreach ($comments as $comment)
        <h3>{{ $comment->name }} さんのコメント</h3>
        {{ $comment->comment }}
        <br><hr>
    @endforeach
@endisset

<!-- フォームエリア -->
<h2>コメントする</h2>
<form action={{ route('comments.create', ['id' => $post]) }} method="POST">
    {{-- {{dd($post)}} --}}
    名前:<br>
    <input name="name">
    <br>
    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>
