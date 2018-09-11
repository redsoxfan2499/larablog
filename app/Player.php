<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'position', 'team', 'slug', 'user_id'];
    
    /**
    * Get the user that owns the widget.
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
