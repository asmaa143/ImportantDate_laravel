<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory ,SoftDeletes,HasRoles;
    protected $guard_name='admin';
    protected $dates = ['deleted_at'];
    protected $table = 'roles';

    protected $fillable = [
        'name','guard_name',
    ];
}
