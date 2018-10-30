@extends('layouts.community')
@section('title', 'イベント一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ action('Admin\AppController@make', ['id' => $community->id]) }}">イベントを新規作成</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <ul class="list-group">
                @if ($community->events != NULL)
                    @foreach($community->events as $event)
                        <div class="list-group-item">
                            <h5>{{ $event->user->name }}</h5>
                            <p>{{ $event->created_at }}</p>
                            <p>{{ $event->title }}</p>
                            <p>{{ $event->date }}</p>
                            <p>{{ $event->place }}</p>
                            <p>{{ $event->detail }}</p>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
