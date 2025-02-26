<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use HasFactory;
    public $table = 'sections_translations';
    protected $fillable = ['name'];
    public $timestamps = false;
}
