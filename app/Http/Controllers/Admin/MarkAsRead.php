<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkAsRead extends Controller
{
    public function mark(Request $request){
        $commId = $request->input('commId');
        $now = date('Y-m-d H:i:s');
        if($commId){
            DB::table('notifications')->where('id', $commId)->update(['read_at' => $now]);
        }
        return redirect()->back();
    }
}
