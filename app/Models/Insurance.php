<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Insurance extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    
  
    protected $translatedAttributes = ['name','notes'];

    protected $fillable = [
    'name','notes',
    'insurance_code',
    'discount_percentage',
    'Company_rate',
    'status'
];
}
