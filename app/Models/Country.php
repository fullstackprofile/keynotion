<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCountry
 */
class Country extends Model
{
    use HasFactory;

    public function events(){
        return $this->belongsToMany(Event::class);
    }

    public function states(){

        return $this->hasMany(State::class,'country_id');
    }
}
