<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceListe extends Model
{
    use HasFactory;
    protected $fillable  = ['service_name','service_price','barber_id'];
    Protected $table = 'price_lists';
}
