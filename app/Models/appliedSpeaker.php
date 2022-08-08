<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appliedSpeaker extends Model
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
        'presentation_proposal',
        'learn',
        'other',
    ];



}
