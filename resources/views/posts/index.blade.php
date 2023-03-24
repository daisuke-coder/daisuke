
  @extends('layouts.app')

  @section('content')
  <div class="container">
    <p class="pull-right right-btn"><a href="/create-form" class="btn">＋新規投稿</a></p>
    <div class="s-form">
      <form method="GET" action="{{ route('posts.index') }}">
        <input class="s-text" type="text" name="sPost" placeholder="キーワードで検索" value="@if (isset($sPost)){{$sPost}}@endif">
        <input class="s-button" type="submit" value="検索">
      </form>
    </div>
    <h2 class="page-header">投稿一覧</h2>
    @if($list->isEmpty())
    <p class="s-error">検索結果は0件です</p>
    <p class="back"><a class="bt-index" href="{{url('/index')}}">一覧へ戻る</a></p>
    @else
    <table class="table table-hover">
      <tr>
        <th>ユーザー名</th>
        <th>投稿内容</th>
        <th>投稿日時</th>
        <th></th>
        <th></th>
      </tr>
      @foreach($list as $list)
      <tr>
        <td>{{$list->user_name}}</td>
        <td>{{$list->contents}}</td>
        <td>{{$list->created_at}}</td>
        <td>
          @if ($authUser == $list->user_name)
          <a href="/post/{{$list->id}}/update-form" class="btn btn-update">編集</a>
          @endif
        </td>
        <td>
          @if($authUser==$list->user_name)
          <a href="/post/{{$list->id}}/delete" class="btn btn-danger" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')">削除</a>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
      @endif
  </div>
  @endsection
