<?php

namespace App\Models;

use App\Gateways\BaseGateway;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperGateway
 */
class Gateway extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;

    public const STATUS_INACTIVE = 2;

    public const TYPE_CC = 1;

    public const TYPE_INVOICE = 2;

    protected $fillable = [
        'name',
        'type',
        'class',
    ];

    public function makeInstanceClass(User $user): BaseGateway
    {
        return new $this->class($user);
    }
}
