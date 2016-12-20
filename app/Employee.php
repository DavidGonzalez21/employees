<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'Employees';

    protected $primaryKey = 'employee_id';

    protected $guarded = array();

    protected $fillable = [
      'first_name',
      'last_name',
      'other_name',
      'email',
      'phone',
      'user_skype',
      'date_of_birth',
      'hire_date',
      'profile_photo'
   ];

    protected $hidden = [''];

    public function tasks ()
    {
        return $this->belongsToMany('App\Task', 'Tasks', 'employee_id', 'task_id')->withPivot('client_id', 'task_name');
    }

}
