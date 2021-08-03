<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';

    protected $fillable = [
        'title_en','title_ar',
        'desc_en','desc_ar','photo','slug'
    ];


    protected $appends =[
        'title','desc'
    ];



    public function getTitleAttribute()
    {
        return Lang::locale() == 'ar' ? $this->title_ar : $this->title_en;
    }


    public function getDescAttribute()
    {
        return Lang::locale() == 'ar' ? $this->desc_ar : $this->desc_en;
    }
}
