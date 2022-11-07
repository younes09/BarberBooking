<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','barber_id','rating_avrg','phone','salon_name','gps_location','wilaya','comune','address','start_price','profile_img','sex','dateN'];
    protected $attributes = [
        'rating_avrg' => 0,
    ];
    protected $table = "barbers";

}
