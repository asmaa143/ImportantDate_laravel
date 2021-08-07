<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Validator;

class AuthApiController extends Controller
{
    use ApiTrait;
    function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function register(Request $request)
    {
        try {
        $rules=[
            'first_name'=>'required|min:2|max:60',
            'last_name'=>'max:60',
            'email' => 'required|unique:App\Models\User,email',
            'phone_number'=>'nullable|min:11|numeric',
            'password' => 'required|confirmed',
            'address'=>'required',
            'nationality_id'=>'required|exists:nationalities,id',
            'has_wife'=>'boolean|nullable',
            'has_sons'=>'boolean|nullable',
            'has_driver'=>'boolean|nullable',
            'has_servant'=>'boolean|nullable',
        ];

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $this->returnValidationError($validator);
        }

        $user=User::create($request->all());

        $token=$user->createToken('my-app-token')->plainTextToken;

        $responce=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($responce, 201);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
