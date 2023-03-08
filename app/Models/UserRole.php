<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    final public const ADMINISTRATOR = 'administrator';
    final public const CONTRIBUTOR = 'contributor';

    protected $fillable = [
        'name',
    ];

    /**
     * Relation with table User
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
