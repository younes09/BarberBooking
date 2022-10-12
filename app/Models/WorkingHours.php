<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    use HasFactory;
    protected $fillable = ['barber_id','dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi'];
    protected $table = 'working_hours';
}
