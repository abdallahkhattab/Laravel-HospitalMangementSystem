<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Patient extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

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
