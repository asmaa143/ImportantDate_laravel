<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ReminderEvent;
use App\Models\DateSetup;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EventApiController extends Controller
{
    public function getAll()
    {
        $user=User::where('id',auth()->user()->id)->with('events')->get();
        $date=DateSetup::where('name','Iqama')->with('events')->get();

        return[
            'user'=>$user,
            'date'=>$date
        ];


    }


    public function store(Request $request){
        $event=Event::create($request->all());
        $email= $event->user->email;
        Mail::to($email)
            ->later($event->reminder_start,new ReminderEvent());
        return $event;
    }
}
