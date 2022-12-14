<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list = \DB::table('posts')->get();
        //dd($list);
        $user = Auth::user()->username;
        return view('posts.index',['list'=>$list]);
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();
        if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
            $request->session()->put('search', '検索ワード：' . $search);
        } else {
            \Session::forget('search');
            $users = User::all();
        }
        $users = $query->get();



        return view('users.search', compact('users', 'search'));
    }

      public function create(Request $request) //送られたデータを受け取ってる
    {
        //dd($request);
        $post = $request->input('newPost');
        //dd($post);
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/top');
    }

     public function delete($id)
    {
        //dd($id);
        \DB::table('posts')
            ->where('id', $id) //whereは条件を書くとき。,は＝の役目
            ->delete();

        return redirect('/top');
    }

}
