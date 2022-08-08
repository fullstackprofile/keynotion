<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelpernewsCategory
 */
class newsCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
    ];
    public function news()
    {
        return $this->belongsToMany(news::class);
    }
}
