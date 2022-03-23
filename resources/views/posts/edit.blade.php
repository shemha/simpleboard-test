@extends('layouts.layouts')
<!-- 
resources/views/layouts/layouts.blade.phpを拡張テンプレートとして使用
引数には"/"の代わりに"."を使用する
-->
@section('title', 'Simple Board')
<!-- resources/views/layouts/layouts.blade.phpの"yield"の引数'title'に'Simple Board'を代入 -->
@section('content')
<!-- データ量が多い場合は、"section"と"endsection"で挟んむ -->

    <h1>Editing Post</h1>
    
    <!-- 
    何かしらのエラーを受け取った場合
    バリデーションに失敗した際のデフォルトのエラーメッセージを表示
    -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- /posts/:idにPOSTリクエストでフォームに入力されたデータを送信 -->
    <form method="POST" action="/posts/{{ $post->id }}">
        <!-- 「CSRF」という攻撃方法に対処するため、CSRFトークンを生成し、フォームで入力されたパラメータを送信できるようにする -->
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <!-- 
            ヘルパーメソッド'old'を使って送信した内容を保持する
            送信したtitleが空でも元々の内容が補完され、編集済みの場合はそのデータをそのまま保持する
            -->
            <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{ old('title') == '' ? $post->title : old('title') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <!-- 
            ヘルパーメソッド'old'を使って送信した内容を保持する
            送信したcontentが空でも元々の内容が補完され、編集済みの場合はそのデータをそのまま保持する
            -->
            <textarea class="form-control" name="content">{{ old('content') == '' ? $post->content : old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
    
    <a href="/posts/{{ $post->id }}">Show</a>
    <a href="/posts">Back</a>
@endsection