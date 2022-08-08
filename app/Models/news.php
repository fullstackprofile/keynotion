<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class news extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'news_category_id',
        'slug',
        'title',
        'description',
        'date',
        'item',
    ];

    protected $casts = [
        'item' => 'array',
    ];

    public function news_category(): BelongsTo
    {
        return $this->belongsTo(newsCategory::class, 'news_category_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('news_img')->singleFile();
    }

    public function comments(){
        return $this->belongsToMany(comment::class);
    }
}
