<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $address = $request['address'];
        $nationality_id = $request['nationality_id'];
        $type = $request['type'];
        $user_id = auth()->user()->id;

        for ($i = 0; $i < count($first_name); $i++) {
            $data1 = [
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'address' => $address[$i],
                'nationality_id' => $nationality_id[$i],
                'type' => $type,
                'user_id' => $user_id,
            ];

             Family::create($data1);
        }



        return auth()->user()->families;
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
