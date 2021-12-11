<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class TwoFactorController extends Controller
{


    /*
     * Two Factor check index
     */

    public function index(){

        return view('auth.two-factor-challenge');
    }


    /*
     * Two factor code store
     */

    public function store(Request $request){

        $request->validate([
           'code' => ['required']
        ]);


        $twoFaCode = UserCode::where('user_id', '=', auth()->user()->id)
                    ->where('code', '=', $request->code)
                    ->where('updated_at', '>=', now()->subMinutes(10))
                    ->first();


        if (!is_null($twoFaCode)){
            Session::put('user_2fa', auth()->user()->id);
            return redirect()->route('home');
        }

        return back()->with('error', 'You entered wrong code.');

    }


    /*
     * Two factor verification resent code
     */

    public function resend(){
        $user = User::where('id', '=', Auth::id())->first();

        $attributes = new User();
        $attributes->generateCode($user);

        return back()->with('success', 'We sent you code on your email.');

    }






}
