<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name' , 'campus_id'];

    // clinic belongs to campas
    public function campas()
    {
        return $this->belongsTo(Campas::class);
    }

    // clinic has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
