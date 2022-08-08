<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelpereventQuestion
 */
class eventQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'tel',
        'message',
    ];
}
