<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;


class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['student_id' , 'doctor_id' , 'lab_request_id'];

    //one medical history belongs to one doctor
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    //one medcal history belongs to one student

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    //medical History has many lab reports
    public function labRequests()
    {
        return $this->hasMany(LabRequest::class);
    }
    
    //medical history has many medications 
    public function medications(){
        return $this->hasMany(Medication::class);
    } 

    //a table with custom conditional question based on the patient which belong to patient medical history
    public function personal_record(){
        return $this->hasMany(PersonalRecord::class);
    } 

    public function women(){
        return $this->hasOne(Women::class);
    } 
}
