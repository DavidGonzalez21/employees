<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'Events';
    protected $primaryKey = 'event_id';

     protected $fillable = [
        'title', 'location', 'description', 'creator', 'start', 'end'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_events', 'event_id');
    }
}
