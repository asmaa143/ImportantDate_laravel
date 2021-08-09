<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes,HasApiTokens;

    protected $dates = ['deleted_at'];
    protected $table = 'users';
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'address',
        'gender',
        'nationality_id',
        'has_wife',
        'has_sons',
        'has_driver',
        'has_servant',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }
    public function families(){
        return $this->hasMany(Family::class, 'user_id', 'id');
    }

    public function events(){
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function dates()
    {
        return $this->morphMany(Date::class, 'dateable');
    }

    public function personalCard()
    {
        return $this->photos()->where('type', 'personalCard');
    }

    public function birth()
    {
        return $this->photos()->where('type', 'birth');
    }

    public function residence()
    {
        return $this->photos()->where('type', 'residence');
    }

    public function IDDate()
    {
        return $this->dates()->where('type', 'ID');
    }

    public function residenceDate()
    {
        return $this->dates()->where('type', 'residence');
    }

    public function licenceDate()
    {
        return $this->dates()->where('type', 'licence');
    }

    public function carDate()
    {
        return $this->dates()->where('type', 'car');
    }


    public function setPasswordAttribute($input): void
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
}
