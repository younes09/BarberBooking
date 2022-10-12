<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable  = ['rating','comment','customer_id','barber_id','state_of_approvment'];
    protected $table = "reviews";
}
