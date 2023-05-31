<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory,
        SoftDeletes;

    public const ADMIN_ROLE_ID = 1;

    /**
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_role_id', 'id');
    }
}
