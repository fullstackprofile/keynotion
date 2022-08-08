<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\news;
use App\Models\newsCategory;
use App\Models\subscriber;
use App\Notifications\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;

class NewsController extends Controller
{

    public function index()
    {
        $news = news::orderBy('id', 'asc')->paginate(15);
        return view('admin.news.index', [
            'news' => $news
        ]);
    }

    public function search(Request $request): View
    {
        $search = $request->input('search', 'NULL');

        $news = news::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.news.index')->with(array('news' => $news));
    }

    public function create(): View
    {
        return view('admin.news.create', [
            'news_categories' => newsCategory::orderBy('id', 'asc')->get(),
        ]);
    }


    public function store(NewsStoreRequest $request, subscriber $subscriber)
    {
        $news = news::create($request->validated());
        $news->addMedia($request->file('news_img'))->toMediaCollection('news_img');

        $subscriber = subscriber::all();
        $news = news::latest()->first();
        $message = [
            'title' => $news->title,
            'description' => $news->description,
            'date' => $news->date,
            'image_cover' => $news->getFirstMediaUrl('news_img')
        ];
        Notification::send($subscriber, new Subscribers($message));
        return redirect()->route('news.index')->withSuccess("Nice Job! You're news has been successfully saved :) !");
    }


    public function show(news $news)
    {
        //
    }


    public function edit(news $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'news_categories' => newsCategory::orderBy('id', 'asc')->get(),
        ]);
    }


    public function update(NewsUpdateRequest $request, news $news)
    {
        $news->update($request->validated());
        if ($request->hasFile('news_img')) {
            $news->addMedia($request->file('news_img'))->toMediaCollection('news_img');
        }
        return redirect()->route('news.index')->withSuccess("Nice Job! You're news has been successfully updated :) !");
    }


    public function destroy(news $news)
    {
        $news->delete();
        return redirect()->back()->withSuccess(" You're news has been successfully deleted !");
    }

    public function send_message()
    {

    }

}
