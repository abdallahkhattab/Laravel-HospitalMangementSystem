<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model implements TranslatableContract 
{
    use HasFactory,Translatable;


    public $translatedAttributes = ['driver_name','notes'];

    protected $fillable = [
        'driver_name','notes',
        'car_number',
        'car_model',
        'car_year_made',
        'driver_license_number',
        'driver_phone',
        'is_available',
        'car_type'
    ];


}
