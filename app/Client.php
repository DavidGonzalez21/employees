<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'Clients';

    protected $primaryKey = 'client_id';

    protected $fillable = ['first_name', 'last_name', 'email', 'country'];

    public function tasks()
    {
    	return $this->hasMany('App\Task', 'client_id');
    }
}
