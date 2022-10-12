<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','phone','wilaya','comune','gps_location','profile_img'];
    protected $table = "customers";

}
