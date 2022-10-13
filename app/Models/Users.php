<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family_name',
        'email',
        'user_type',
        'password',
    ];
    protected $table = 'users';
}
