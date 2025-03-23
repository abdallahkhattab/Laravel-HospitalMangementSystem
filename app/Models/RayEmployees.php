<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Correct import

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RayEmployees extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
}
