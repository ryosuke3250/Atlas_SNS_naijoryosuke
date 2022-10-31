<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
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

}
