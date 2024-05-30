<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagePost;
use App\Models\User;
use App\Models\Comment;

class House extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable=[
        'title',
        'author',
        'Expirationdate',
        'content',
        'bed',
        'bath',
        'area',
        'phone',
        'price',
        'size',
        'images',
        'user_id',
    ];
    public function comforts(){
        return $this->hasMany(Comfort::class,'house_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'house_id','id');
    }
    public function imagePosts()
    {
        return $this->hasMany(ImagePost::class, 'image_id','images');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function likes(){
        return $this->hasMany(Like::class,'house_id','id');
    }
}
