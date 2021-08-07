<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class Nationality extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'nationalities';

    protected $appends =[
        'name'
    ];

    protected $fillable = [
        'name_en', 'name_ar',
    ];


//    public function scopeSelection($query)
//    {
//        return $query->select('id', 'name_' . app()->getLocale() . ' as namew');
//    }



    public function getNameAttribute()
    {
        return Lang::locale() == 'ar' ? $this->name_ar : $this->name_en;
    }


    public function users() {
        return $this->hasMany(User::class, 'nationality_id', 'id');
    }


    public function families() {
        return $this->hasMany(Family::class, 'nationality_id', 'id');
    }
}
