<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Client;
use App\Employee;
use Carbon\Carbon;

use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       /*$tasks = DB::table('Tasks')
         ->where('Clients.client_id', '=', 'Tasks.client_id')
         ->where('Employees.employee_id', '=', 'Tasks.employee_id')
         ->select('Tasks.task_name', 'Clients.*', 'Employees.first_name')
         ->get();

      dd($tasks);
      exit();
*/
      //dd($tasks[0]->employees[0]->first_name);
      $tasks = Task::all();
      $employees = Employee::all();
      $clients = Client::all(); 

       return view('content.panel_tasks', compact('tasks', 'employees', 'clients'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $taskdata = Task::create([
        'task_name' => $request['task_name'],
        'start_work' => $request['start_work'],
        'end_work' => $request['end_work'],
        'employee_id' => $request['employee_id'],
        'client_id' => $request['client_id'],
      ]);

      $taskdata->clients()->attach($request->client_id, ['employee_id' => $request->employee_id]);

      return redirect('/tasks')->with('success', $request['task_name'] . ' has been added successfuly!..');
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
    }

    public function details($id)
    {
        $task = Task::find($id);

        //dd($task->employees);
        return view('content.task_details', compact('task'));
    }
}
