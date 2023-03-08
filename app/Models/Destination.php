<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'location',
        'description',
    ];

    /**
     * Relation with table DestinationRegion
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationRegion()
    {
        return $this->belongsTo(DestinationRegion::class);
    }

    /**
     * Relation with table DestinationTag
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function destinationTags()
    {
        return $this->belongsToMany(DestinationTag::class, 'destination_relation_tag');
    }
    /**
     * Relation with table DestinationImage
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinationImages()
    {
        return $this->hasMany(DestinationImage::class);
    }
}
