<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin IdeHelperEvent
 */
class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'start_date',
        'end_date',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'small_description',
        'about_info',
        'key_topics',
        'vip_tour',
        'key_takeaway',
    ];

    protected $casts = [
        'key_topics' => 'array',
        'vip_tour' => 'array',
        'key_takeaway' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    /**
     * @return BelongsToMany
     */
    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class);
    }

    public function attenders(): BelongsToMany
    {
        return $this->belongsToMany(Attender::class);
    }

    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class);
    }

    public function places(): BelongsToMany
    {
        return $this->belongsToMany(Place::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('event_img')->singleFile();
        $this->addMediaCollection('event_about_img')->singleFile();
    }

}
