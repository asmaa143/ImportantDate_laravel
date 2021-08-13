<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'events';

    protected $appends = [
        'reminder_date','reminder_dates'
    ];

    protected $fillable = [
        'name',
        'date',
        'type_id',
        'user_id',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dateType()
    {
        return $this->belongsTo(DateSetup::class, 'type_id', 'id');
    }


    public function getReminderDateAttribute()
    {
        $type = $this->dateType->reminder_start;
        $number = $this->dateType->number;

        if ($type === 1) {
           return $this->date->subDays($number);
        } elseif ($type === 2) {
            return $this->date->subWeeks($number);
        } elseif ($type === 3) {
            return $this->date->subMonths($number);
        } elseif ($type === 4) {
            return $this->date->subYears($number);
        } else {
            return false;
        }

    }


    public function getReminderDatesAttribute(){
        $frequency = $this->dateType->frequency;
        $date=$this->date;
        $first_reminder=$this->reminder_date;
        $addedDays= (int) $first_reminder->diffInDays($date)/$frequency;
        $reminder_dates=[];
        $reminder_dates[0]=clone $first_reminder;
        for($i=1 ; $i < $frequency ; $i++){
            $var=clone $reminder_dates[$i-1];
            $reminder_dates [$i]= $var->addDays($addedDays);
        }
        return $reminder_dates;

    }

}
