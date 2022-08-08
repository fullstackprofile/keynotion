<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelpersubscriber
 */
class subscriber extends Model
{
    protected $fillable = [
        'email',
    ];

    use HasFactory , Notifiable;
}
