<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ray extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description','invoice_id','patient_id','doctor_id','case','employee_id','employee_id','description_employee'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function employee()
    {
        return $this->belongsTo(RayEmployees::class,'employee_id')
            ->withDefault(['name'=>'noEmployee']);
    }

    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

}
