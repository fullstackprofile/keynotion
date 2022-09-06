<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperOrder
 */
class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'gateway_id',
        'subtotal',
        'vat',
        'total',
        'order_number',
        'status',
    ];

    /**
     * @return HasMany
     */

    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    /**
     * @return HasMany
     */

    public function delegaters(): HasMany
    {
        return $this->hasMany(Delegate::class, 'order_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function gateway(): BelongsTo
    {
        return $this->belongsTo(Gateway::class);
    }

    /**
     * @return HasOne
     */

    public function company(): HasOne
    {
        return $this->hasOne(CompanyDetails::class, 'order_id', 'id');
    }

}
