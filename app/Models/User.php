<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Clinic\Clinic;
use App\Models\students;
use App\Models\Rol;
use App\Models\Clinic\Labreport;
use App\Models\Clinic\LabRequest;
use App\Models\Clinic\Room;
use App\Models\Clinic\Department;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected function role(){
    //     get:fn($value)=>["user", "admin", "receptionist", "doctor", "lab_assistant"][$value];
    // }

    // user belongs to campas 
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    // user has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    //lab reports belongs to a user
    public function labRequest(){
        return $this->hasMany(labRequest::class);
    }

    //user belong to room
    public function room()
    {
        return $this->hasOne(Room::class);
    }
    //user belongs to one department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
