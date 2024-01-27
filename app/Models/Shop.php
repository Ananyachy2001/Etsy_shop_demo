<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $primaryKey = 'shop_id';

    public function listings()
    {
        return $this->hasMany(Listing::class, 'shop_id');
    }

    public function receivedOrders()
    {
        return $this->hasMany(ReceivedOrder::class, 'shop_id');
    }

    public function collections()
    {
        return $this->hasMany(Collection::class, 'shop_id');
    }
}
