@extends('layouts.app')

@section('content')
<div class="container update-form">
  <h2 class="page-header">投稿の編集</h2>
  {!! Form::open(['url'=>'/post/update']) !!}
  <div class="form-group">
    {!! Form::hidden('id',$post->id) !!}
    {!! Form::input('text','upPost',$post->post,['required','class'=>'form-control']) !!}
    @if(isset($errormessage))
    <p class="error">{{$errormessage}}</p>
    @endif
    @if(isset($emptymessage))
    <p class="error">{{$emptymessage}}</p>
    @endif
  </div>
  <button type="submit" class="btn btn-primary pull-right">更新</button>
  {!! Form::close() !!}
</div>
@endsection
