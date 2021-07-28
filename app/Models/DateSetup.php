<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DateSetup extends Model
{
    use HasFactory ,SoftDeletes;

    const REMINDER_DAYS = 1;
    const REMINDER_WEEKS = 2;
    const REMINDER_MONTHS = 3;
    const REMINDER_YEARS = 4;

    protected $dates = ['deleted_at'];
    protected $table='dates_setup';

    protected $fillable = [
        'name',
        'reminder_start',
        'number',
        'frequency',
    ];
}
