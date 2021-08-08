<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\Nationality;
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Auth;
use Validator;

class UserAPIController extends Controller
{
    use ApiTrait,ImageTrait;
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
        $request->validate([
            'gender'=>'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->update(['gender'=>$request['gender']]);

        if(isset($request['date']))
        {
            foreach (array_filter($request['date']) as $type => $date) {
                $user->dates()->create(['date' => $date, 'type' => $type]);
            }
        }

        if(isset($request['photo']))
        {
            foreach (array_filter($request['photo']) as $type => $src) {
                $image = $this->saveImage($src, 'Upload/dashboard/photo/');
                $user->photos()->create(['src' => $image, 'type' => $type]);
            }
        }
        return $user->load('dates','photos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id != auth()->user()->id){
           return response([
               'message'=>'Not Auth'
           ]);
        }
        $user = User::where('id', auth()->user()->id)->first();
        return $user;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function image($count, $user, $image, $type)
    {

        if ($count > 0) {
            $this->deleteImage($user->$type->first()->src, 'dashboard/photo/');
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $user->photos()->updateOrCreate(['type' => $type], ['src' => $image2]);
        } else {
            $image2 = $this->saveImage($image, 'Upload/dashboard/photo/');
            $user->photos()->create(['src' => $image2, 'type' => $type]);
        }

    }


    public function update(Request $request, User $user)
    {
        if($user->id != auth()->user()->id){
            return response([
                'message'=>'Not Auth'
            ]);
        }
         $user->update($request->all());

        if (isset($request['date'])) {
            foreach (array_filter($request['date']) as $type => $date) {
                $data = ['type' => $type];
                $user->dates()->updateOrCreate($data, ['date' => $date]);
            }
        }

        if (isset($request['birth'])) {
            $this->image($user->birth->count(), $user, $request['birth'], 'birth');
        }

        if (isset($request['residence'])) {
            $this->image($user->residence->count(), $user, $request['residence'], 'residence');
        }

        if (isset($request['personalCard'])) {

            $this->image($user->personalCard->count(), $user, $request['personalCard'], 'personalCard');
        }

        return $user->fresh()->load('photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
