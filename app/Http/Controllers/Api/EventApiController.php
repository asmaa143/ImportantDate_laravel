<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DateSetup;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
