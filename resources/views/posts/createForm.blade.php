  @extends('layouts.app')

  @section('content')
  <div class="container new-post">
    <h2 class="page-header">新規投稿</h2>
    {!! Form::open(['url'=>'post/create'])!!}
    <div class="form-group">
      {!! Form::input('text','newPost',null,['class'=>'form-control','placeholder'=>'投稿内容（100文字以内）','align'=>'middle'])!!}
    @if(isset($errormessage))
    <p class="error">{{$errormessage}}</p>
    @endif
    @if(isset($emptymessage))
    <p class="error">{{$emptymessage}}</p>
    @endif
      {!! Form::hidden('newName',Auth::user()->name)!!}

    </div>
    <button type="submit" class="btn post-button pull-right">投稿する</button>
    {!! Form::close() !!}
  </div>
 @endsection
