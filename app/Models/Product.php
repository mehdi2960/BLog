<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['title', 'text', 'image', 'price', 'amount', 'view'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
