<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
class ImagePost extends Model
{
    use HasFactory;
    // public function houses(){
    //     return $this->belongsTo(House::class, 'image_id');
    // }
    protected $fillable = ['image_id','image_url'];
    public function houses(){
        return $this->belongsTo(House::class, 'image_id');
    }

}
