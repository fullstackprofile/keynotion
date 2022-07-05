<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\ItemStoreRequest;
use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items=Item::orderBy('id','asc')->paginate(15);
        return view('Admin.Item.index',[
            'items'=>$items
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $items = Item::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('Admin.Item.index')->with(array('items'=>$items));
    }


    public function create()
    {
        return view('Admin.Item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        $item = Item::create($request->validated());

        return redirect()->route('item.create')->withSuccess("Nice Job! You're item has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }


    public function edit(Item $item)
    {
        return view('Admin.Item.edit',[
            'items'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        $item->update($request->validated());
        return redirect()->route('item.index')->withSuccess("Nice Job! You're item has been successfully updated :) !");
    }


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->withSuccess(" You're item has been successfully deleted !");
    }
}
