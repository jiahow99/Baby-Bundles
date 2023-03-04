<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['products', 'total_price'];
    protected $cast = [
        'total_price' => 'float(9,2)'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
