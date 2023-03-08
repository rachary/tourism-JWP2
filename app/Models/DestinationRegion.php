<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationRegion extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Relation with table Destination
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
    
        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
