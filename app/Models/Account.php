<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApITokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;

class Account extends Model implements CanResetPassword,AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable,Authenticatable ;


   

   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='accounts';
    protected $fillabele=[
//write the coloumn of ur table here
         'name',
         'email',
         'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
/**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    
}