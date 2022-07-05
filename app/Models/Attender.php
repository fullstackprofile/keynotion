<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAttender
 */
class Attender extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        ];

    public function events(){
        return $this->belongsToMany(Event::class);
    }
}
