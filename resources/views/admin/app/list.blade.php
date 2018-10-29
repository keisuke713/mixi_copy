@extends('layouts.comment')
@section('title', 'コメント一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <ul class="list-group">
                <div class="list-group-item">
                    <h5>{{ $tweet->user->name }}</h5>
                    <p>{{ $tweet->created_at }}</p>
                    <p>{{ $tweet->content }}</p>
                    @if ( $tweet->comments != NULL)
                        @foreach ( $tweet->comments as $comment)
                            <div class="list-group-item">
                                <h5>{{ $comment->user->name }}</h5>
                                <p>{{ $comment->created_at }}</p>
                                <p>{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </ul>
        </div>
    </div>
</div>
@endsection
