<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = task::all();
        $tasks = task::where('user_id',auth()->id())->get();//to gae all of data from table in database
        return view('tasks.view',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       task::create(['task'=>$request->input('task'),'user_id'=>auth()->id()]);

        return redirect('tasks');
//       return view('tasks.view');

//        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = task::findOrFail($id);

        return view('tasks.edit', compact('edit'));

//        return view('tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $edit = task::findOrFail($id);

        $edit->task = request('task');
        $edit->save();
        return redirect('tasks');



//        $validatedData = validate(['task' => 'required']);
//        task::whereId($id)->update($validatedData);
//
//        return redirect()->with('success', 'Book is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        task::destroy($id);
        return redirect()->action('taskController@index');
    }
}
