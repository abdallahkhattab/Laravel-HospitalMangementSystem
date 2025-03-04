<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Service extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $translatedAttributes = ['name'];
    protected $fillable = ['price','description','status'];

    public function groups(){
    return $this->belongsToMany(Group::class);
    }

}
