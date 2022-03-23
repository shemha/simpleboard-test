@extends('layouts.layouts')
<!-- 
resources/views/layouts/layouts.blade.phpを拡張テンプレートとして使用
引数には"/"の代わりに"."を使用する
-->
@section('title', 'Simple Board')
<!-- resources/views/layouts/layouts.blade.phpの"yield"の引数'title'に'Simple Board'を代入 -->
@section('content')
<!-- データ量が多い場合は、"section"と"endsection"で挟んむ -->
    
    <h1>Posts</h1>
    
    <!-- posts変数は配列のためforeach文で展開 -->
    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>

                <div class="d-flex" style="height: 36.4px;">
                    <!-- aタグのリンクにidを、ハイパーテキストをtitleにして投稿ページへのリンクを作成 -->
                    <!-- // <a href="/posts/{{ $post->id }}">{{ $post->title }}</a> -->
                    <!-- aタグのリンクにidを、ハイパーテキストをShowにして投稿ページへのリンクを作成 -->
                    <a href="/posts/{{ $post->id }}" class="btn btn-outline-primary">Show</a>
                    <!-- aタグのリンクにidを指定して該当ページの編集へのリンクを作成 -->
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit</a>
                    
                    <!-- 
                    /posts/:idごとに削除を実行可能に
                    POSTリクエスト送信前（type属性がsubmitのbuttonタグが押された時）にコンファームを表示しTrueが選択されたら送信
                    -->
                    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <!-- DELETEリクエストを送信 -->
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- 送信時にCSRFトークンを生成 -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <a href="/posts/create">New Post</a>
@endsection