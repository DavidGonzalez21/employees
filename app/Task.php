<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "Tasks";

    protected $primaryKey = 'task_id';

    protected $guarded = array();

    protected $fillable = [
      'task_name',
      'start_work',
      'end_work',
      'employee_id',
      'client_id',
    ];

    public function clients()
    {
        return $this->belongsToMany('App\Clients', 'Tasks', 'client_id', 'task_id')->withPivot('employee_id', 'task_name');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'Tasks', 'employee_id', 'task_id')->withPivot('client_id', 'task_name');
    }

}
