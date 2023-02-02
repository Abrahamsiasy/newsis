<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;

class Queue extends Model
{
    use HasFactory;
    //table queues
    protected $table = 'queues';

    //queue has one student and one room
    //que has one student and one room
    //fillable student_id and doctor_id
    protected $fillable = ['student_id', 'doctor_id'];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

}
