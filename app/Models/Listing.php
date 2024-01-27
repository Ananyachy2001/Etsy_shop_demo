<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $primaryKey = 'listing_id';

    public function variants()
    {
        return $this->hasMany(ListingVariant::class, 'listing_id');
    }

    public function sets()
    {
        return $this->hasMany(Set::class, 'listing_id');
    }
}
