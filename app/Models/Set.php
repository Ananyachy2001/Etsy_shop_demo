<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $primaryKey = 'set_id';

    public function files()
    {
        return $this->hasMany(File::class, 'set_id');
    }
}
