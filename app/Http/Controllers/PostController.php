<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // <FQDN>/postsのindexアクションのビュー
    public function index()
    {
        // モデル名::all()で作成されている投稿をすべて取得
        $posts = Post::all();
        
        // resources/views/postsディレクトリにあるビュー名'index'のbladeファイルを表示
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // <FQDN>/posts/createのcreateアクションのビュー
    public function create()
    {
        // resources/views/postsディレクトリにあるビュー名'create'のbladeファイルを表示
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // storeアクションのビュー
    // <FQDN>/posts/createからPOSTリクエストで送信されたパラメータを受け取る
    // 受け取ったパラメータは$request内に保存され、$request->input('title')のようにパラメータを属性ごとに取り出せる
    public function store(Request $request)
    {
        // 新しいPostモデルの空のレコードを作成
        $post = new Post();
        // $requestに保存されているパラメータをPostモデルのカラムごとに取り出す
        // $postのtitleにinputタグのname属性'title'からの値を代入
        $post->title = $request->input('title');
        // $postのcontentにinputタグのname属性'content'からの値を代入
        $post->content = $request->input('content');
        // 作成したモデルのデータをラベルごとに当てはめて保存
        $post->save();

        // 最後に/posts/:idというURLへリダイレクト
        // キーidにPostモデルのidを代入し、そのidをURLの末端パス名にする
        // with関数でフラッシュメッセージ(名前:messageと表示するメッセージ)を作成
        return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Post was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    // /posts/:idのビューの作成
    // 引数$postで/posts/:idから自動的に該当する投稿データを取得
    public function show(Post $post)
    {
        // compact関数でキー'post'に引数$postの値を代入
        return view('posts.show', compact('post'));
    }

    /*
    // 別解
    public function show($id)
    {
        // Postモデルからidを検索して$postへ代入
        $post = Post::findOrFail($id);

        // compact関数でキー'post'に引数$postの値を代入
        return view('posts.show', compact('post'));
    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    // updateアクションのビュー
    // <FQDN>/posts/updateからPOSTリクエストで送信されたパラメータを受け取る
    // 受け取ったパラメータは$request内に保存され、$request->input('title')のようにパラメータを属性ごとに取り出せる
    public function update(Request $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Post was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    // destroyアクションのビュー
    public function destroy(Post $post)
    {
        // $postに一致するレコードをPostモデルから削除
        $post->delete();
        // 最後に/indexというURLへリダイレクト
        return redirect()->route('posts.index');
    }
}
