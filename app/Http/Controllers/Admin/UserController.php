<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user=User::orderBy('created_at','desc')->get();

        return view('Admin.Users.index',[
            'users'=>$user
        ]);
    }


    public function change_role(Request $request)
    {
        if (isset($request->role) && isset($request->user_id)){
            $user = User::findOrFail($request->user_id);
            $user->role = $request->role;
            $user->save();
        }
    }
}
