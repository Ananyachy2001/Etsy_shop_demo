<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $primaryKey = 'collection_id';

    public function sets()
    {
        return $this->hasMany(Set::class, 'collection_id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'collection_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
