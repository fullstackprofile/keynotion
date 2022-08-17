<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class CompanyDetails extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'company_name',
        'country_region',
        'street_address',
        'town_city',
        'postcode_zip',
        'phone',
        'email',
        'vat_number',
    ];

    /**
     * @return BelongsTo
     */

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
