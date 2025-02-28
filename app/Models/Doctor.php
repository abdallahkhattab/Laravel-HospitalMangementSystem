<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Doctor extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['name','appointments'];

    protected $fillable = [
    'section_id',
    'name',
    'email',
    'email_verified_at',
    'password',
    'phone',
    'price',
    'appointments',
    ];

    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2',
    ];

     /**
     * Get the doctor's image.
     */
    public function image():MorphOne{

    return $this->morphOne(Image::class, 'imageable');

    }

    public function Section(){
        return $this->belongsTo(Section::class);
    }

}
