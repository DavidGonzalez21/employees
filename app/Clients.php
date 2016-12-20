<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //
    protected $table = 'Clients';

    protected $primaryKey = 'client_id';

    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'country'
   ];

    protected $hidden = [''];

    public function tasks ()
    {
        return $this->belongsToMany('App\Task', 'client_employee_task', 'client_id', 'task_id')->withPivot('employee_id');
    }
}
