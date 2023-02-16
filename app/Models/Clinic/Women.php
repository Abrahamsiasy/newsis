<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Women extends Model
{
    use HasFactory;
    //fillabe values for last_menstrual_cycle	number_of_pregnancies	pregnancie_complications	number_of_live_births	manopause_date
    protected $fillable = [
        'last_menstrual_cycle',
        'number_of_pregnancies',
        'pregnancie_complications',
        'number_of_live_births',
        'manopause_date'
    ];
}
