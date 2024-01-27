<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'received_order_id';

    public function listings()
    {
        return $this->hasMany(Listing::class, 'received_order_id');
    }
}
