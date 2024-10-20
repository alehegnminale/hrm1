<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['vacancy_id', 'first_name','middle_name','last_name','email','phone','gender','department','qualification','disabilities', 'GPA','experience', 'resume'];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}