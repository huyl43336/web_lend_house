<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $fillable = [
        'user_id',
        'house_id',
        'comment_id', // Add this field
        'content',
    ];
    use HasFactory;
      public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
