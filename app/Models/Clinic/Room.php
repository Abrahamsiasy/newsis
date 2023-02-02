<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }

    //user belongs to rooms
    public function user() {
        return $this->belongsTo(User::class);
    }

    //user belongs to rooms
    public function students() {
        return $this->hasMany(Student::class);
    }
}
