<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Patient extends Authenticatable implements TranslatableContract
{
    use HasFactory,Translatable;

        public function singleInvoices()
    {
        return $this->hasMany(single_invoice::class, 'patient_id');
    }

    public function receiptAccounts()
    {
        return $this->hasMany(ReceiptAccount::class, 'patient_id');
    }

    public function patientAccounts()
    {
        return $this->hasMany(PatientAccount::class, 'patient_id');
    }


    protected $translatedAttributes = ['name'];


    
    protected $fillable = [
    'name',
    'Address',
    'email',
    'password',
    'Date_Birth',
    'Phone',
    'Gender',
    'Blood_Group',
];
}
