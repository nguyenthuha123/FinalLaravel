<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    
 protected $fillable = ['quantity', 'price', 'product_id', 'orders_id'];

 public function products(){
     return $this->belongsTo(Product::class);
   }

   public function orders(){
    return $this->belongsTo(Order::class);
  } 
   
}
