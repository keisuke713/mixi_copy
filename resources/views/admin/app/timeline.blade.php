@extends('layouts.community')
@section('title', 'タイムライン')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if($community->users->find(Auth::user()->id))
                <a href="{{ action('Admin\AppController@tweet', ['id' => $community->id]) }}">新しくツイートを作成して投稿する</a>
            @else
                <a href="{{ action('Admin\AppController@flash', ['id' => $community->id]) }}">新しくツイートを作成して投稿する</a>
            @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <ul class="list-group">
              @forelse($community->tweets()->orderBy('id', 'desc')->get() as $tweet)
                  <div class="list-group-item">
                      <h5>{{ $tweet->user->name }}</h5>
                      <p>{{ $tweet->created_at }}</p>
                      <p>{{ $tweet->content }}</p>
                      <a href="{{ action('Admin\AppController@comment',['id' => $tweet->id]) }}" role=button class="btn btn-primary">コメントする</a>
                      <a href="{{ action('Admin\AppController@list', ['id' => $tweet->id]) }}">{{ $tweet->comments->count()."件の返信" }}</a>
                  </div>
              @empty
                  <p>つぶやきはありません</p>
              @endforelse
            </ul>
        </div>
    </div>
@endsection
