<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Community;
use App\Tweet;

class AppController extends Controller
{
    public function add()
    {
        return view('admin.app.profile');
    }

    public function new()
    {
        return view('admin.app.create');
    }

    public function create(Request $request)
    {
        //Validation
        $this->validate($request, Community::$rules);

        $community = new Community;
        $form = $request->all();

        //フォームから画像が送られてきたら保存して$community->image_pathに保存する
        if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          $community->image_path = basename($path);
        }
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['image']);

        //データベースに保存する
        $community->fill($form);
        $community->save();

        return redirect('admin/app');
    }

    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        // $cond_name が空白でない場合は、記事を検索して取得する
        if ($cond_name != '') {
            $posts = Community::where('name', $cond_name)->get();
        } else {
            //それ以外は全てのコミュニティを検索する
            $posts = Community::all();
        }

        return view('admin.app.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

    public function detail(Request $request)
    {
        //community modelからデータを取得する
        $community = Community::find($request->id);

        return view('admin.app.detail', ['community' => $community]);
    }

    public function timeline(Request $request)
    {
        //community modelからデータを取得する
        $community = Community::find($request->id);

        return view('admin.app.timeline', ['community' => $community]);
    }

    public function tweet(Request $request)
    {
        $community = Community::find($request->id);

        return view('admin/app/tweet', ['community' => $community]);
    }

    public function contribution(Request $request)
    {
        
        $this->validate($request, Tweet::$rules);

        $tweet = new Tweet;
        $tweet->community_id = $request->community()->id;
        $tweet->user_id = $request->user()->id;
        $tweet->content = $request->content;

        $tweet->save();

        return view('admin/app/profile');

    }

    public function event(Request $request)
    {
        //community modelからデータを取得する
        $community = Community::find($request->id);

        return view('admin.app.event', ['community' => $community]);
    }
}
