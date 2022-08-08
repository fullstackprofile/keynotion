<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelpercomment
 */
class comment extends Model
{
    protected $fillable = [
        'news_id',
        'email',
        'name',
        'comment',
        'website',
        'approve',
    ];

    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(news::class, 'news_id', 'id');
    }
}
