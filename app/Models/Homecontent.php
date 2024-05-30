<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homecontent extends Model
{
    use HasFactory;
    protected $fillable=[
    'video_url',
    'caption_carousel',
    'carousel',
    'top_house',
    ];
}
