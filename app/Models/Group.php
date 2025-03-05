<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;



class Group extends Model implements TranslatableContract
{
  
    use HasFactory,Translatable;
    protected $translatedAttributes = ['name','notes'];
    protected $fillable = [
    'Total_before_discount',
    'discount_value',
    'Total_after_discount',
    'tax_rate','
    Total_with_tax'
];
   
public function service_group()
{
    return $this->belongsToMany(Service::class);
}

}
