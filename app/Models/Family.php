<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory ,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'families';
    const TYPE_WIFE = 1;
    const TYPE_SON = 2;
    const TYPE_DAUGHTER = 3;
    const TYPE_DRIVER = 4;
    const TYPE_SERVANT = 5;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'type',
        'nationality_id',
        'user_id',
    ];

    public function nationality() {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function photos(){
        return $this->morphMany(Photo::class,'photoable');
    }

    public function dates(){
        return $this->morphMany(Date::class,'dateable');
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
}
