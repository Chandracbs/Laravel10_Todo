<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {   
        $todos =  Todo::all();
        return view('index',compact('todos'));
    }


    public function store(Request $request)
    {
        // Todo::create([
        //     'title'=>$request->get('title')
        // ]);
        Todo::create($request->all());

        return redirect()->route('index')->with('success', 'Inserted');
    }

    public function edit(string $id)
    {
        $todos = Todo::findOrFail($id);
        return view('edit',compact('todos'));
    }

    public function create()
    {
        //
    }



    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $todos = Todo::findOrFail($id);
        $todos->update($request->all());
        return redirect()->route('index')->with('success','User updated successfully');
    }


    public function destroy(string $id)
    { 
        $todos = Todo::findOrFail($id);
        $todos->delete();
        return redirect()->route('index')->with('success','User deleted successfully');
    }
}
