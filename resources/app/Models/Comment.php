<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'content',
        'id',
        
    ];
  
    public function house(){
        return $this->belongsTo(House::class,'house_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
