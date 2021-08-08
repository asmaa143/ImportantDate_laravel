<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPasswordResets extends Model
{
    use HasFactory;
    protected $table='user_password_resets';
    public $timestamps=false;
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'email',
        'token',
        'created_at',
        'code',
    ];
}
