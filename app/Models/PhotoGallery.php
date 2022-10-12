<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $fillable = ['img_link','barber_id'];
    protected $table = "photos_gallery";
}
