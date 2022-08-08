<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category=category::orderBy('id','asc')->get();
        return view('admin.category.index',[
            'categories'=>$category
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search','NULL');

        $category = category::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.category.index')->with(array('categories'=>$category));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryStoreRequest $request): mixed
    {
        $category = category::create($request->validated());
        return redirect()->route('category.index')->withSuccess("Nice Job! You're category has been successfully created :) !");
    }


    public function show(category $category)
    {
        //
    }

    public function edit(category $category)
    {
        return view('admin.category.edit',[
            'categories'=>$category
        ]);
    }


    public function update(CategoryUpdateRequest $request, category $category)
    {
        $category->update([
            'title'=>$request->title,
        ]);
        return redirect()->route('category.index')->withSuccess("Nice Job! You're category has been successfully updated :) !");
    }


    public function destroy(category $category)
    {
        $category->events()->detach();
        $category->delete();
        return redirect()->back()->withSuccess(" You're category has been successfully deleted !");
    }
}
