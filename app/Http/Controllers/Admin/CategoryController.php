<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::orderBy('id','asc')->get();
        return view('Admin.Category.index',[
            'categories'=>$category
        ]);
    }


    public function create()
    {
        return view('Admin.Category.create');
    }


    public function store(CategoryStoreRequest $request): mixed
    {
        $category = Category::create($request->validated());
        return redirect()->route('category.index')->withSuccess("Nice Job! You're category has been successfully created :) !");
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


    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update([
            'title'=>$request->title,
        ]);
        return redirect()->route('category.index')->withSuccess("Nice Job! You're category has been successfully updated :) !");
    }


    public function destroy(Category $category)
    {
        $category->events()->detach();
        $category->delete();
        return redirect()->back()->withSuccess(" You're category has been successfully deleted !");
    }
}
