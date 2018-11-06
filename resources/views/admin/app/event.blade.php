@extends('layouts.community')
@section('title', 'イベント一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if($community->users->find(Auth::user()->id))
                <a href="{{ action('Admin\AppController@make', ['id' => $community->id]) }}">イベントを新規作成</a>
            @else
                <a href="{{ action('Admin\AppController@flash', ['id' => $community->id]) }}">イベントを新規作成</a>
            @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <ul class="list-group">
                @forelse($community->events()->orderBy('id', 'desc')->get() as $event)
                    <div class="list-group-item">
                        <h5>{{ $event->user->name }}</h5>
                        <p>{{ $event->created_at }}</p>
                        <p>{{ $event->title }}</p>
                        <p>{{ $event->date }}</p>
                        <p>{{ $event->place }}</p>
                        <p>{{ $event->detail }}</p>
                    </div>
                @empty
                    <p>開催予定のイベントはありません</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
