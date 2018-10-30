<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Community;
use App\Tweet;
use App\Comment;
use App\Event;



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

    public function top($id)
    {
        //community modelからデータを取得する
        //$community = Community::find($request->id);

        return view('admin.app.top', ['community' => Community::find($id)]);
    }

    public function timeline($id)
    {


        return view('admin.app.timeline', ['community' => Community::find($id)]);
    }

    public function tweet($id)
    {
        //$community = Community::find($request->id);

        return view('admin/app/tweet', ['community' => Community::find($id)]);
    }



    public function contribution(Community $community, Request $request)
    {

        $this->validate($request, Tweet::$rules);

        $tweet = new Tweet;
        $tweet->community_id = $community->id;
        $tweet->user_id = Auth::User()->id; // communityとリレーションしているなら$community->user->id;とかもOK
        $tweet->content = $request->content;

        $tweet->save();

        return view('admin/app/profile');

    }

    public function comment($id)
    {
        return view('admin/app/comment', ['tweet' => Tweet::find($id)]);
    }

    public function post(Tweet $tweet, Request $request)
    {

        $this->validate($request, Comment::$rules);

        $comment = new Comment;
        $comment->tweet_id = $tweet->id;
        $comment->user_id = Auth::User()->id;
        $comment->content = $request->content;

        $comment->save();

        return view('admin/app/profile');
    }

    public function list($id)
    {
        return view('admin.app.list', ['tweet' => Tweet::find($id)]);
    }
    public function event($id)
    {
        //community modelからデータを取得する
        //$community = Community::find($request->id);

        return view('admin.app.event', ['community' => Community::find($id)]);
    }

    public function make($id)
    {
        return view('admin.app.make', ['community' => Community::find($id)]);
    }

    public function submit(Community $community, Request $request)
    {
        $this->validate($request, Event::$rules);

        $event = new Event;
        $event->community_id = $community->id;
        $event->user_id = Auth::User()->id;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->place = $request->place;
        $event->detail = $request->detail;

        $event->save();

        return view('admin.app.profile');
    }

}
