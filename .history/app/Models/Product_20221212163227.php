<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','price','condition'];
    protected $cast = [
        'price' => 'float(9,2)'
    ];

    
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }

    public function categoryName()
    {
        return $this->category->name ?? '';
    }
}
