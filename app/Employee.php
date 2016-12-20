<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'Employees';

    protected $primaryKey = 'employee_id';

    //protected $hidden = [''];

    protected $fillable = ['first_name', 'last_name', 'other_name', 'email', 'phone', 'user_skype', 'date_of_birth', 'hire_date'];

    public function getFullNameAttribute()
   	{
     return $this->first_name.' '.$this->last_name;
   	}

    public function tasks()
    {
      return $this->belongsToMany('App\Task', 'employee_task');
    }
}
