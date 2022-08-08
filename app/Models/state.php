<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperState
 */
class State extends Model
{
    use HasFactory;

    public function countries(){

        return $this->belongsTo(Country::class,'country_id');
    }

    public function cities(){

        return $this->hasMany(City::class,'state_id');
    }

    public function events(){
        return $this->belongsToMany(Event::class);
    }
}