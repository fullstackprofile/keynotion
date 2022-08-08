<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperattender
 */
class attender extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        ];

    public function events(){
        return $this->belongsToMany(event::class);
    }
}
