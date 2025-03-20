<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;


    protected $fillable = ['date','diagnosis','medicine','invoice_id','patient_id','doctor_id','review_date'];

    public function Doctor(){
        
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
