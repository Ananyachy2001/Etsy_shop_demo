<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const ROLE_ADMIN = 'Admin';
    const ROLE_CUSTOMER = 'Customer';

    protected $primaryKey = 'user_id'; // Specify the primary key column name

    protected $fillable = [
        'name', 'username', 'address', 'email', 'password', 'user_role', 'user_group'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function receivedOrders()
    {
        return $this->hasMany(ReceivedOrder::class, 'user_id');
    }

    public function getCreatedAtAttribute($value)
{
    return $this->asDateTime($value)->diffForHumans();
}
}
