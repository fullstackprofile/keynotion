<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCity
 */
class City extends Model
{
    use HasFactory;
    public function states(){

        return $this->belongsTo(State::class,'state_id');
    }

    public function events(){
        return $this->belongsToMany(Event::class);
    }

}
