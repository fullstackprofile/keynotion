<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpeakerController extends Controller
{

    public function index()
    {
        $speaker=Speaker::orderBy('created_at','asc')->get();
        return view('Admin.Speaker.index',[
            'speakers'=>$speaker
        ]);
    }


    public function create()
    {
        return view('Admin.Speaker.create');
    }


    public function store(Request $request)
    {
        $new_speaker=new Speaker();

        $new_speaker->full_name=$request->full_name;
        $new_speaker->slug = Str::random(11);

        /*-------------------------------Speaker image-----------------------------*/

        $new_speaker_img = "/speaker_img/" . time() . Str::random(25) . '.' . $request->file('avatar')->getClientOriginalExtension();
        $path = public_path('/speaker_img/');
        $request->file('avatar')->move($path, $new_speaker_img);
        $new_speaker->avatar=$new_speaker_img;

        /*-------------------------------Speaker Company Logo-----------------------------*/

        $new_speaker_logo = "/speaker_company_logo/" . time() . Str::random(25) . '.' . $request->file('company_logo')->getClientOriginalExtension();
        $path = public_path('/speaker_company_logo/');
        $request->file('company_logo')->move($path, $new_speaker_logo);
        $new_speaker->company_logo=$new_speaker_logo;

        /*--------------------------------------------------------------------------------*/

        $new_speaker->profession=$request->profession;
        $new_speaker->company=$request->company;

        $new_speaker->save();



        return redirect()->back()->withSuccess("Nice Job! You're speaker has been successfully created :) !");
    }


    public function show(Speaker $speaker)
    {
        //
    }


    public function edit(Speaker $speaker)
    {
        return view('Admin.Speaker.edit',[
            'speakers'=>$speaker
        ]);
    }


    public function update(Request $request, Speaker $speaker)
    {
        if($request->hasFile('avatar')) {
            $speaker->full_name=$request->full_name;

            $path_avatar = $_SERVER['DOCUMENT_ROOT'] . $speaker->avatar;
            if(file_exists($path_avatar)){
                !unlink($path_avatar);
            }
            $new_speaker_img = "/speaker_img/" . time() . Str::random(25) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $path = public_path('/speaker_img/');
            $request->file('avatar')->move($path, $new_speaker_img);
            $speaker->avatar=$new_speaker_img;

            $speaker->profession=$request->profession;
            $speaker->company=$request->company;
        }
        if($request->hasFile('company_logo')) {
            $speaker->full_name=$request->full_name;

            $path_logo = $_SERVER['DOCUMENT_ROOT'] . $speaker->company_logo;
            if(file_exists($path_logo)){
                !unlink($path_logo);
            }
            $new_speaker_logo = "/speaker_company_logo/" . time() . Str::random(25) . '.' . $request->file('company_logo')->getClientOriginalExtension();
            $path = public_path('/speaker_company_logo/');
            $request->file('company_logo')->move($path, $new_speaker_logo);
            $speaker->company_logo=$new_speaker_logo;

            $speaker->profession=$request->profession;
            $speaker->company=$request->company;
        }else{
            $speaker->full_name=$request->full_name;
            $speaker->profession=$request->profession;
            $speaker->company=$request->company;
        }
        $speaker->save();
        return redirect()->back()->withSuccess("Nice Job! You're speaker has been successfully updated :) !");

    }



    public function destroy(Speaker $speaker)
    {
        $path_avatar = $_SERVER['DOCUMENT_ROOT'] . $speaker->avatar;
        if(file_exists($path_avatar)){
            !unlink($path_avatar);
        }

        $path_logo = $_SERVER['DOCUMENT_ROOT'] . $speaker->company_logo;
        if(file_exists($path_logo)){
            !unlink($path_logo);
        }
        $speaker->events()->detach();
        $speaker->delete();
        return redirect()->back()->withSuccess("You're speaker has been successfully deleted !");
    }
}
