<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function children(){
        return $this->hasMany(CategoryChild::class, 'category_parent_id', 'id');
    }
}