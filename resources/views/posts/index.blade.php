<!-- 
    新しい投稿を行うとindexアクションを呼び出す条件式
    with関数の第一引数でスードニム'message'を指定してフラッシュメッセージを作成
    成功したらTrueを返すので、成功した時に第二引数のメッセージを表示するようにしている
-->
@if (session('message'))
    {{ session('message') }}
@endif

<h1>Posts</h1>

@foreach($posts as $post)
    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">Delete</button>
    </form>
@endforeach

<a href="/posts/create">New Post</a>