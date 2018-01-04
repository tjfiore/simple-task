<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests;
use App\Repositories\TaskRepository;
use Validator, Session;


class TaskController extends Controller
{
  /**
  * The task repository instance.
  *
  * @var TaskRepository
  */
 protected $tasks;

  /**
   * Create a new controller instance.
   *
   * @param  TaskRepository  $tasks
   * @return void
   */
  public function __construct(TaskRepository $tasks)
  {
      $this->middleware('auth');
      $this->tasks = $tasks;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // return $tasks;
        return view('tasks.index', [
          'tasks' => $this->tasks->forUser($request->user())
        ]);
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
          'description' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
          return redirect('/tasks')->withErrors($validator)->withInput();
        }else{

  #create() will automatically set the user_id property of the given task to
  #the ID of the currently authenticated user
          $request->user()->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
          ]);

          return redirect('/tasks');
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
        $rules = [
          'name' => 'required|max:255',
          'description' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
          return redirect('/tasks')->withErrors($validator)->withInput();
        }else{

        $current_task = Task::find($id);

        $current_task->name = $request->name;
        $current_task->description = $request->description;
        $current_task->save();

        Session::flash('message','Task updated!');
        return redirect('/tasks');

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        //$deleted_task = Task::findOrFail($id);

      $this->authorize('destroy', $task);

       if($task->delete()){
       Session::flash('message', 'Task deleted!');
       return redirect('/tasks');
      }else {
       Session::flash('message', 'Failed to delete task!');
       return redirect('/tasks');
      }


    }
}
