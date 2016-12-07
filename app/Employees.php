<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $table = 'Employees';

    protected $primaryKey = 'employee_id';

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

}
