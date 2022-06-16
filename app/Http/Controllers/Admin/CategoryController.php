<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::orderBy('created_at','asc')->get();
        return view('Admin.Category.index',[
            'categories'=>$category
        ]);
    }


    public function create()
    {
        return view('Admin.Category.create');
    }


    public function store(Request $request)
    {
        $new_category=new Category();
        $new_category->title=$request->title;
        $new_category->slug = Str::random(11);
        $new_category->save();

        return redirect()->back()->withSuccess("Nice Job! You're category has been successfully created :) !");
    }


    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('Admin.Category.edit',[
            'categories'=>$category
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->save();
        return redirect()->back()->withSuccess("Nice Job! You're category has been successfully updated :) !");
    }


    public function destroy(Category $category)
    {
        $category->events()->detach();
        $category->delete();
        return redirect()->back()->withSuccess(" You're category has been successfully deleted !");
    }
}
