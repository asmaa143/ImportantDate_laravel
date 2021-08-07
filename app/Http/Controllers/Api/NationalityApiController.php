<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NationalityResource;
use App\Models\Nationality;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class NationalityApiController extends Controller
{
    use ApiTrait;
    public function index()
    {
        $nationalities= NationalityResource::collection(Nationality::all());
        return $this->returnData('nationality',$nationalities,'data success');
    }
}
