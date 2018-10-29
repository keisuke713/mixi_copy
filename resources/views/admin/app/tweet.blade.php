@extends('layouts.community')
@section('title', 'ツイート作成')

@section('content')
    <div calss="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{ action('Admin\AppController@contribution', ['id' => $community->id]) }}" method="post">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="10">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="ツイートする">
                </form>
            </div>
        </div>
    </div>
@endsection
