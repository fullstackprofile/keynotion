<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperState
 */
class state extends Model
{
    use HasFactory;

    public function countries(){

        return $this->belongsTo(country::class,'country_id');
    }

    public function cities(){

        return $this->hasMany(city::class,'state_id');
    }

    public function events(){
        return $this->belongsToMany(event::class);
    }
}
