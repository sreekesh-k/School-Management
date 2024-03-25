<?php

namespace App\Http\Controllers;


use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function read()
    {
        $uid = auth()->user()->id;
        $items = Item::where('uid', $uid)->get();
        return view('index', ['items' => $items]);
    }
    public function create()
    {
        return view('create');
    }
    public function createConfirm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $uid = auth()->user()->id;
        $data['uid'] = $uid;
        $newitem = item::create($data);
        return redirect(route('reading'))->with('success', 'Item Created SuccessFully');
    }
    public function update(item $item)
    {
        return view('update', ['item' => $item]);
    }
    public function updateConfirm(Request $request, item $item)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $item->update($data);
        return redirect(route('reading'))->with('success', 'Item Updated SuccessFully');
    }
    public function delete(item $item)
    {
        $item->delete();
        return redirect(route('reading'))->with('success', 'Item Deleted SuccessFully');
    }
}
