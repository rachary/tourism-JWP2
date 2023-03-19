<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationTag extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Relation with table Destination
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function destination()
    {
        return $this->belongsToMany(Destination::class);
    }

            /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
