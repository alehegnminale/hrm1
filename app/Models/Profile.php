<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profiles';

    protected $fillable = [
         'account_id', 'first_name', 'middle_name', 'last_name','email','gender','martial_status','age','phone_number','photo'
   
    ];


    public function account()
{
    return $this->belongsTo(Account::class);
}

}
