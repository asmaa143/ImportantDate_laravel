<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPasswordResets;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordApiController extends Controller
{


    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->input('email');
        if (User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'User doen\'t exists!'
            ], 404);
        }
        $token = Str::random(64);
        $code = Str::random(4);
        $created_at = Carbon::now();
        try {
            DB::table('user_password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'code' => $code,
                'created_at' => $created_at
            ]);

            Mail::send('email.reset-code', ['code' => $code], function (Message $message) use ($email) {
                $message->to($email);
                $message->subject('Reset your password');
            });
            return response([
                'message' => 'Check your email'
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 404);
        }

    }


    public function loginResetCode(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
        $code = $request->input('code');
         //$date = Carbon::now()->addSeconds(0.5)->format('Y-m-d H:i:s');
        // $formatted = $date->format('Y-m-d H:i:s');
        $date2 = Carbon::now()->addSeconds(10)->format('Y-m-d H:i:s');
        $created_at=DB::table('user_password_resets')
            ->where('code', $code)->first()->created_at;

        if (!$passwordResets = DB::table('user_password_resets')
            ->where('code', $code)
            ->whereBetween(DB::raw('DATE(created_at)'), array($created_at, $date2))
            ->first()) {
            return response([
                "message" => 'Invalid Code!'
            ], 404);
        }



        if (!User::where('email', $passwordResets->email)->first()) {
            return response([
                'message' => 'User doen\'t exists!'
            ], 404);
        }

        return response([
            'message' => 'Success'
        ]);

    }
}
