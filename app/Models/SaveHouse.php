<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveHouse extends Model
{
    use HasFactory;
    protected $fillable=['house_id','user_id','url'];
    public function store_house(){
        return $this->hasMany(House::class,'id','house_id');
    }
}
