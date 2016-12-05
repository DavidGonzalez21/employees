<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $table = 'Employees';
    protected $fillable = ['first_name', 'last_name', 'other_name', 'email', 'phone', 'user_skype', 'date_of_brth', 'hire_date'];
    
}
