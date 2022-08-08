<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\ItemStoreRequest;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items=item::orderBy('id','asc')->paginate(15);
        return view('admin.item.index',[
            'items'=>$items
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $items = item::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.item.index')->with(array('items'=>$items));
    }


    public function create()
    {
        return view('admin.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        $item = item::create($request->validated());

        return redirect()->route('item.create')->withSuccess("Nice Job! You're item has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }


    public function edit(item $item)
    {
        return view('admin.item.edit',[
            'items'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, item $item)
    {
        $item->update($request->validated());
        return redirect()->route('item.index')->withSuccess("Nice Job! You're item has been successfully updated :) !");
    }


    public function destroy(item $item)
    {
        $item->delete();
        return redirect()->back()->withSuccess(" You're item has been successfully deleted !");
    }
}
