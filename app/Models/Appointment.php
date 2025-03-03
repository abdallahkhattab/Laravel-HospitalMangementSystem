<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'appointment_doctor', 'appointment_id', 'doctor_id');
    }
}

