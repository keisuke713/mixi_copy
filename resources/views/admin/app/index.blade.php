@extends('layouts.admin')
@section('title', 'コミュニティ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>コミュニティ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-9">
                <form action="{{ action('Admin\AppController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-3">コミュニティ名</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="cond_name" value={{ $cond_name }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <a href="{{ action('Admin\AppController@add') }}" role=button class="btn btn-primary">プロフィールに戻る</a>
            </div>
        </div>
        <div class="row">
            <div class="list-community col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="50%">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $community)
                                <tr>
                                    <th>{{ $community->id }}</th>
                                    <th>{{ str_limit($community->name, 50) }}</th>
                                    <th>{{ str_limit($community->detail, 250) }}</th>
                                    <th>
                                        <div>
                                            <a href="{{ action('Admin\AppController@top', ['id' => $community->id]) }}">詳しく見てみる</a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
