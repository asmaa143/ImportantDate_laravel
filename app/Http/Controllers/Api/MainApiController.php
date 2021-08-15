<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenderResource;
use App\Models\Event;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class MainApiController extends Controller
{
    use ApiTrait;
    public function gender(){
        $gender= new GenderResource($this);
        return $this->returnData('gender',$gender,'data success');
    }

    public function search($event){

        return Event::where('date',$event)->get();

    }
}
