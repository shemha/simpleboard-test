<!-- 
新しい投稿を行うとshowアクションを呼び出す条件式
with関数の第一引数でスードニム'message'を指定してフラッシュメッセージを作成
成功したらTrueを返すので、成功した時に第二引数のメッセージを表示するようにしている
-->
@if (session('message'))
    {{ session('message') }}
@endif