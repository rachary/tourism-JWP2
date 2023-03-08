<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'time',
        'organizer',
        'date_start',
        'date_end',
        'location',
    ];

    /**
     * Relation with table EventImage
     * 
     * @return 
     */
    public function eventImages()
    {
        return $this->hasMany(EventImage::class);
    }
}
