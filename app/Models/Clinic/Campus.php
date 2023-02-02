<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Campus extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name'];

    // campas has many clinics 
    public function clinics()
    {
        return $this->hasOne(Clinic::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
