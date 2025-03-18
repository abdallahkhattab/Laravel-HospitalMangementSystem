<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Doctor extends Authenticatable implements TranslatableContract
{
    use HasFactory,Translatable;
    
    public $translatedAttributes = ['name'];

    protected $fillable = [
        'section_id',
        'email',
        'password',
        'phone',
        'status',
        'price',
    ];


    public function appointments(){
        return $this->belongsToMany(Appointment::class, 'appointment_doctor', 'doctor_id', 'appointment_id');
        }

     /**
     * Get the doctor's image.
     */
    public function image():MorphOne{

    return $this->morphOne(Image::class, 'imageable');

    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

}
