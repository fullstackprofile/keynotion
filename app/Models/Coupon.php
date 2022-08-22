<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperCoupon
 */
class Coupon extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'code',
        'discount',
        'user',
        'email',
        'creation_date',
        'expiration_date',
        'percent_amount'
    ];


}
