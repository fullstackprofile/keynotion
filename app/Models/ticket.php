<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @mixin IdeHelperticket
 */
class ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'type_id',
        'other_type_id',
        'slug',
        'price',
        'sale',
        'currency',
        'attractive',
    ];

    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(event::class, 'event_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(item::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class,'type_id','id');
    }

    public function othertype()
    {
        return $this->belongsTo(otherType::class,'other_type_id','id');
    }
}
