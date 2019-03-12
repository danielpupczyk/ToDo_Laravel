<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Auth;
use App\Task;
use App\User;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$tasks = DB::table('tasks')
                     ->select('*')
                     ->where('users_id', '=', Auth::user()->id)
                     ->get();*/
		$tasks = Task::where('users_id','=',Auth::user()->id)->paginate(10);
		
        return view('tasks.index', compact('tasks'));
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
    public function store(TasksRequest $request)
    {
        Task::create($request->all() + ['users_id' => Auth::user()->id,'status'=>'active']);
		return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TasksRequest $request, Task $task)
    {
		if($request->status!=$task->status)
			if($request->status=='done'){
				$task->update($request->all() + ['done_at' => date('Y-m-d H:i:s')]);
			}
			else
				$task->update($request->all() + ['done_at' => NULL]);
		else 
			$task->update($request->all());
		return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
		return redirect()->route('tasks.index');
    }
}
