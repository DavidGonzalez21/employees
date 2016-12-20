<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $table = 'Holidays';

    protected $primaryKey = 'holiday_id';

    protected $fillable = [
        'holiday_name', 'holiday_date', 'country'
    ];
}
