@extends('layouts.community')
@section('title', 'イベント作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="{{ action('Admin\AppController@submit', ['id' => $community->id]) }}" method="post">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="date">日時</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="date" value="{{ old('date') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="place">場所</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="detail">詳細</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="detail" rows="20">{{ old('detail') }}</textarea>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="作成する">
            </form>
        </div>
    </div>
</div>
@endsection
