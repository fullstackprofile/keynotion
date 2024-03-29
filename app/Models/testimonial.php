<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelpertestimonial
 */
class testimonial extends Model implements  HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'star',
        'testimonial',
        'full_name',
        'heading',
        'company',
        'profession',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('testimonial_logo')->singleFile();
    }


}
