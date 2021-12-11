<?php

namespace App\Models;

use App\Mail\SendCodeMail;
use App\Notifications\EmailVerificationNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\TwoFactorNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*
     * Password reset link
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    /*
     * Email verification link
     */

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification(Auth::user()));
    }

    /**
     * Generate 2fa code
     */

    public function generateCode($user){

        $code = rand(100000, 999999);

        UserCode::updateOrCreate(
            ['user_id' => $user->id],
            ['code' => $code]
        );

        try {
            $details = [
              'title' => 'Your two factor authentication code is:',
              'code' => $code
            ];

            \Mail::to($user->email)->send(new SendCodeMail($details));

        } catch (Exception $e){
            info("Error: ". $e->getMessage());
        }

    }

}
