<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brochure extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'company_name',
        'job_title',
        'phone',
        'corporate_email',
        'country',
        'summit_name',
        'comment',
        'learn',
        'other',
    ];
}
