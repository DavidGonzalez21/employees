<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'Clients';

    protected $primaryKey = 'client_id';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'useer_skype', 'from'];

    public function employees()
    {
    	return $this->belongsToMany('App\Employee', 'Tasks', 'client_id', 'employee_id')
    	->withPivot('task_name', 'start_work', 'end_work');
    }
}
