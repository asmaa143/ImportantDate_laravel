<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\Nationality;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Auth;
use Validator;

class UserAPIController extends Controller
{

              use ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new UsersResource();
        $nation=Nationality::all();
        return $this->returnData('nationalities',$nation,'data success');
    }

    public function getNationalityById(Request $request)
    {
        $nation=Nationality::selection()->find($request->id);
        if(!$nation)
        return $this-> returnError('001','This Nationality Not Found');
        return $this->returnData('nationality',$nation,'data success');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
