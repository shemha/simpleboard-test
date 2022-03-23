{{-- /postsというURLにPOSTリクエストでフォームに入力されたデータをパラメータとして送信 --}}
<form method="POST" action="/posts">
    {{-- CSRFトークンを生成し、フォームで入力されたデータをパラメータとして送信 --}}
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="text" name="content">
    <input type="submit">
</form>