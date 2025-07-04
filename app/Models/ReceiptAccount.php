<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptAccount extends Model
{
    use HasFactory;

    protected $table = 'receipt_accounts';
    
    public $timestamps = false; // Disable automatic timestamps
    
    protected $fillable = ['date', 'patient_id', 'Debit', 'description'];


     public function patients()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
