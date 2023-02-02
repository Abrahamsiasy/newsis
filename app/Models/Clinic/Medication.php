<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected  $fillable = [ 'name', 'amount', 'frequency', 'how_much', 'medicalrecord_id'];

    //medication belongs to medical history
    public function medicalRecord(){
        return $this->belongsTo(MedicalRecord::class);
    }
}
