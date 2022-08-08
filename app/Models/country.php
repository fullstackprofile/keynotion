<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelpercountry
 */
class country extends Model
{
    use HasFactory;

    public function events(){
        return $this->belongsToMany(event::class);
    }

    public function states(){

        return $this->hasMany(state::class,'country_id');
    }
}
