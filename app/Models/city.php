<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCity
 */
class city extends Model
{
    use HasFactory;
    public function states(){

        return $this->belongsTo(state::class,'state_id');
    }

    public function events(){
        return $this->belongsToMany(event::class);
    }

}
