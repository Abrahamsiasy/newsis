<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;

class Room extends Model
{
    use HasFactory;

    //create fillables fror this model
    protected $fillable = [
        'room_no',
        'room_title',
        'room_type'  
    ];
    public $timestamps = false;
    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }

    //user belongs to rooms
    public function user() {
        return $this->hasOne(User::class);
    }

    //user belongs to rooms
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function roomFilter($query, array $filters) {
        if ($filters['camp'] ?? false ) {
            $query->where('campus_id', 'like', '%' . request('camp') . '%');
        }
    }
}
