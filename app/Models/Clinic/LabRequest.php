<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class LabRequest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'doctor_id', 'student_id'];

    //Labreport belongs to one user
    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // //lab report has one lab results
    // public function labResult(){
    //     return $this->hasOne(LabResult::class);
    // }

    // //lab report has belongs to patient history
    // public function medicalHistories()
    // {
    //     return $this->belongsTo(Medicalhistory::class);
    // }

    //lab report has one student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //lab report has one labqueue
    public function labQueue()
    {
        return $this->hasMany(Labqueues::class);
    }

    
}
