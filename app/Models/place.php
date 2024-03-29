<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin IdeHelperplace
 */
class place extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'address',
        'company',
        'latitude',
        'longitude',
        'link'
    ];

    public function events(){
        return $this->belongsToMany(event::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('place_cover')->singleFile();
        $this->addMediaCollection('place_logo')->singleFile();
    }
}
