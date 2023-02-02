<?php

namespace App\Models\Clinic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'comment', 'lab_report_id', 'student_id'];

    //lab result has lab reports
    public function labRequests()
    {
        return $this->belongsTo(Labreport::class);
    }
}
