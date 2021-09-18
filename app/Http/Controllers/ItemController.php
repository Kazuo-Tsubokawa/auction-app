<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Psy\ExecutionLoop\RunkitReloader;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show', ['item' => $item]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(ItemRequest $request)
    {
        $item = new Item;
        //値を用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;
        //保存
        $item->save();

        return redirect('/items');
    }

    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);
    }

    public function update(ItemRequest $request, $id)
    {
        $item = Item::find($id);
        // 値の用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;

        // 保存
        $item->save();

        // 登録したらindexに戻る
        return redirect('/items');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/items');
    }
}
