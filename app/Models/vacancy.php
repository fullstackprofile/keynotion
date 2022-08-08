<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelpervacancy
 */
class vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'job_description',
        'about_role',
        'looking_for',
        'benefits',
    ];
    protected $casts = [
        'about_role' => 'array',
        'looking_for' => 'array',
        'benefits' => 'array'
    ];
}
