<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperOrder
 */
class Order extends Model
{
    use HasFactory,Notifiable;

     protected $fillable = [
         'Subtotal',
         'VAT',
         'Total',
         'payment_method',
         'order_number',
         'status',
         'user_id'
     ];

    /**
     * @return HasMany
     */

    public function order_items():HasMany
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    /**
     * @return HasMany
     */

    public function delegaters():HasMany
    {
        return $this->hasMany(Delegate::class,'order_id','id');
    }

    /**
     * @return HasOne
     */

    public function company(): HasOne
    {
        return $this->hasOne(CompanyDetails::class,'order_id','id');
    }

}
