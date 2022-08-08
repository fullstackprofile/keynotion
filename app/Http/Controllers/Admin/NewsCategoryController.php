<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCategory\NewsCategoryStoreRequest;
use App\Http\Requests\NewsCategory\NewsCategoryUpdateRequest;
use App\Models\newsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{

    public function index()
    {
        $news_category=newsCategory::orderBy('id','asc')->get();
        return view('admin.newscategory.index',[
            'news_categories'=>$news_category
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search','NULL');

        $news_category = newsCategory::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.newscategory.index')->with(array('news_categories'=>$news_category));
    }


    public function create()
    {
        return view('admin.newscategory.create');
    }


    public function store(NewsCategoryStoreRequest $request)
    {
        $news_category = newsCategory::create($request->validated());
        return redirect()->route('news_category.index')->withSuccess("Nice Job! You're news category has been successfully created :) !");
    }


    public function show(newsCategory $newsCategory)
    {
        //
    }


    public function edit(newsCategory $newsCategory)
    {
        return view('admin.newscategory.edit',[
            'news_categories'=>$newsCategory
        ]);
    }

    public function update(NewsCategoryUpdateRequest $request, newsCategory $newsCategory)
    {
        $newsCategory->update($request->validated());
        return redirect()->route('news_category.index')->withSuccess("Nice Job! You're news category has been successfully updated :) !");
    }


    public function destroy(newsCategory $newsCategory)
    {
        $newsCategory->delete();
        return redirect()->back()->withSuccess(" You're news category has been successfully deleted !");
    }
}
