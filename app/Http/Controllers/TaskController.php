<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests;
use Validator, Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get tasks from database
        $tasks = Task::orderBy('created_at','desc')->get();
        return view('tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
          'name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
          return redirect('/')->withErrors($validator)->withInput();
        }else{
          $task = new Task;

          $task->name = $request->name;
          $task->save();

          return redirect('/');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::findOrFail($id);

        $this->validate($request, [
          'name' => 'required',
        ]);

        $data = $request->all();
        $task->fill($data)->save();

        Session::flash('message','Task updated!');
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted_task = Task::find($id);

        if($deleted_task->delete()) {
         # code...
         Session::flash('message', 'Task deleted!');
         return redirect('/');
       }else {
         # code...
         Session::flash('message', 'Failed to delete task!');
         return redirect('/');
       }
    }
}
