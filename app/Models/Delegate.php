<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperDelegate
 */
class Delegate extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'ticket_id',
        'order_id',
        'full_name',
        'job_title',
        'email',
    ];

    /**
     * @return BelongsTo
     */

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }


}
