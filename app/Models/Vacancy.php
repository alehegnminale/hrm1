<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'company_name',
        'location',
        'salary_range',
        'application_deadline',
        'posted',
    ];
}
