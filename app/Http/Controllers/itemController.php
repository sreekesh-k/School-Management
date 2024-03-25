<?php

namespace App\Http\Controllers;


use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function read()
    {
        $items = item::all();
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
            'OR' => 'required',
            'Java' => 'required',
            'ASE' => 'required',
            'DAA' => 'required',
            'AI' => 'required',
        ]);
        $totalMarks = $request->OR + $request->Java + $request->ASE +  $request->DAA + $request->AI;
        $uid = auth()->user()->id;
        $data['uid'] = $uid;
        $data['totalMarks'] = $totalMarks;
        $data['password'] = $request->name . "123";
        $newitem = item::create($data);
        return redirect(route('reading'))->with('success', 'student added SuccessFully');
    }
    public function update(item $item)
    {
        return view('update', ['item' => $item]);
    }
    public function updateConfirm(Request $request, item $item)
    {
        $data = $request->validate([
            'name' => 'required',
            'OR' => 'required',
            'Java' => 'required',
            'ASE' => 'required',
            'DAA' => 'required',
            'AI' => 'required',
        ]);
        $totalMarks = $request->OR + $request->Java + $request->ASE +  $request->DAA + $request->AI;
        $uid = auth()->user()->id;
        $data['uid'] = $uid;
        $data['totalMarks'] = $totalMarks;
        $item->update($data);
        return redirect(route('reading'))->with('success', 'details Updated SuccessFully');
    }
    public function delete(item $item)
    {
        $item->delete();
        return redirect(route('reading'))->with('success', 'student removed SuccessFully');
    }
}
