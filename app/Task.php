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

    public function client()
    {
        return $this->belongsTo('App\Clients', 'client_id');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'employee_task');
    }

}
