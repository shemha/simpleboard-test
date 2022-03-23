@extends('layouts.layouts')
<!-- 
resources/views/layouts/layouts.blade.phpを拡張テンプレートとして使用
引数には"/"の代わりに"."を使用する
-->
@section('title', 'Simple Board')
<!-- resources/views/layouts/layouts.blade.phpの"yield"の引数'title'に'Simple Board'を代入 -->
@section('content')
<!-- データ量が多い場合は、"section"と"endsection"で挟んむ -->

    <div class="card">
        <div class="card-body">
            <!-- 
            showアクションによって受け取ったidごとのPostモデルのカラムを取得して表示
            -->
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            
            <div class="d-flex" style="height: 36.4px;">
                <button class="btn btn-outline-primary">Show</button>
                <!-- 該当idの編集ページへのリンク -->
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

    <a href="/posts/{{ $post->id }}/edit">Edit</a>
    <a href="/posts">Back</a>
@endsection