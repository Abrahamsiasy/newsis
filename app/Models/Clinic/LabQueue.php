<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;



class LabQueue extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'lab_assistant_id', 'lab_request_id'];

    //Labqueues has one user
    public function labAssistant()
    {
        return $this->belongsTo(User::class);
    }

    public function labRequest()
    {
        return $this->belongsTo(LabRequest::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
