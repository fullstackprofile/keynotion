<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{

    public function index()
    {
        $news=News::orderBy('id','asc')->paginate(15);
        return view('Admin.News.index',[
            'news'=>$news
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $news = News::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.News.index')->with(array('news'=>$news));
    }

    public function create(): View
    {
        return view('Admin.News.create');
    }


    public function store(NewsStoreRequest $request)
    {
        $news = News::create($request->validated());
        $news->addMedia($request->file('news_img'))->toMediaCollection('news_img');
        return redirect()->route('news.index')->withSuccess("Nice Job! You're news has been successfully saved :) !");
    }


    public function show(News $news)
    {
        //
    }


    public function edit(News $news)
    {
        return view('Admin.News.edit',[
            'news'=>$news
        ]);
    }


    public function update(NewsUpdateRequest $request, News $news)
    {
        $news->update($request->validated());
        if ($request->hasFile('news_img')) {
            $news->addMedia($request->file('news_img'))->toMediaCollection('news_img');
        }
        return redirect()->route('news.index')->withSuccess("Nice Job! You're news has been successfully updated :) !");
    }


    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back()->withSuccess(" You're news has been successfully deleted !");
    }
}
