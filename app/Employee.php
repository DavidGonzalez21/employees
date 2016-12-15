<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'Employees';

    protected $primaryKey = 'employee_id';

    //protected $hidden = [''];

    protected $fillable = ['first_name', 'last_name', 'other_name', 'email', 'phone', 'user_skype', 'date_of_brth', 'hire_date'];

    public function clients()
    {
      return $this->belongsToMany('App\Client', 'Tasks', 'employee_id', 'client_id')
      ->withPivot('task_name', 'start_work', 'end_work');
    }
}
