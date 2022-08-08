<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'description',
        'date',
        'item',
    ];

    protected $casts = [
        'item' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('news_img')->singleFile();
    }

}
