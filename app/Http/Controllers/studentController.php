<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function read()
    {
        $students = student::all();
        return view('index', ['students' => $students]);
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
        $newstudent = student::create($data);
        return redirect(route('reading'))->with('success', 'student added SuccessFully');
    }
    public function update(student $student)
    {
        return view('update', ['student' => $student]);
    }
    public function updateConfirm(Request $request, student $student)
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
        $student->update($data);
        return redirect(route('reading'))->with('success', 'details Updated SuccessFully');
    }
    public function delete(student $student)
    {
        $student->delete();
        return redirect(route('reading'))->with('success', 'student removed SuccessFully');
    }
}
