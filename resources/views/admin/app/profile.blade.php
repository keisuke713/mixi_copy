{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に’mixi'を埋め込む --}}
@section('title', 'mixi')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ action('Admin\AppController@index') }}" role="button" class="btn btn-primary">コミュニティ一覧</a>
            </div>
            <div class="col-md-4">
                <a href="{{ action('Admin\AppController@new') }}" role="button" class="btn btn-primary">新規コミュニティ作成</a>
            </div>
        </div>
        <div class="row">
            <h2>プロフィールページ</h2>
        </div>
        <table class="list" align="center">
            <tr>
                <th class="th">名前</th>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <th class="th">性別</th>
                <td>{{ Auth::user()->gender }}</td>
            </tr>
            <tr>
                <th class="th">年齢</th>
                <td>{{ Auth::user()->age }}</td>
            </tr>
            <tr>
                <th class="th">趣味</th>
                <td>{{ Auth::user()->hobby }}</td>
            </tr>
            <tr>
                <th class="th">参加コミュニティ</th>
                    @if( Auth::user()->communities != NULL)
                        @foreach( Auth::user()->communities as $community )
                            <td><a href="{{ action('Admin\AppController@top', ['id' => $community->id]) }}">{{ $community->name }}</a></td>
                        @endforeach
                    @else
                        <p>参加中のコミュニティはありません</p>
                    @endif
            </tr>
        </table>
    </div>
@endsection
