<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin IdeHelperOtherType
 */
class otherType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
    ];

    public function tickets(){
        return $this->belongsToMany(ticket::class);
    }
}
