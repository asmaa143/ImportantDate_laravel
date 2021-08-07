<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DateTypeResource;
use App\Models\DateSetup;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class DateTypeApiController extends Controller
{
    use ApiTrait;
    public function index()
    {
        $dates= DateTypeResource::collection(DateSetup::all());
        return $this->returnData('date-type',$dates,'data success');

    }
}
