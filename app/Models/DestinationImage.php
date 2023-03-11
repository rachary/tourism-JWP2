<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DestinationImage extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Relation with table Destination
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Generate image url.
     * 
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function imageUrl(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->filename ? Storage::url('destination_images/' . $this->filename) : null;
            },
        );
    }
}
