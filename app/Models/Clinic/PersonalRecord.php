<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'disease_or_conditions',
        'current',
        'comments',
    ];

    //medication belongs to medical history
    public function medicalRecord(){
        return $this->belongsTo(MedicalRecord::class);
    }
}
