<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @mixin IdeHelperTicket
 */
class Ticket extends Model
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
    ];

    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function othertype()
    {
        return $this->belongsTo(OtherType::class,'other_type_id','id');
    }
}
