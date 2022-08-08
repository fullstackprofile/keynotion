<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\otherType;
use App\Models\user;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user=user::orderBy('created_at','desc')->paginate(15);

        return view('admin.users.index',[
            'users'=>$user
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $users = user::query()
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.users.index')->with(array('users'=>$users));
    }

    public function change_role(Request $request)
    {
        if (isset($request->role) && isset($request->user_id)){
            $user = user::findOrFail($request->user_id);
            $user->role = $request->role;
            $user->save();
        }
    }
}
