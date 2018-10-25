@extends('layouts.community')
@section('title', 'タイムライン')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ action('Admin\AppController@tweet', ['id' => $community->id]) }}">新しくツイートを作成して投稿する</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <ul class="list-group">
                @if ($community->tweets != NULL)
                    @foreach ($community->tweets as $tweet)
                        <li>{{ $tweet->user_id }}</li>
                        <li>{{ $tweet->content }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
