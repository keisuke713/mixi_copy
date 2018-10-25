@extends('layouts.admin')
@section('title', 'コミュニティの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <h2>コミュニティ作成</h2>
        </div>
        <div class="row">
            <!--<div class="col-md-9">
                <form action>
                    <div class="form-group row">
                        <label class="col-md-3">コミュニティ名</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>-->
            <div class="col-md-3">
                <a href="{{ action('Admin\AppController@add') }}" role=button class="btn btn-primary">プロフィールに戻る</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('Admin\AppController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">コミュニティ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="detail">詳細</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="detail" rows="20">{{ old('detail') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="作成する">
                </form>
            </div>
        </div>
    </div>
@endsection
