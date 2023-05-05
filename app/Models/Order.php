<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $primaryKey = 'id';
    protected $fillable = ['firstname',
    'lastname', 
    'address',
    'phonenumber',
    'Totalprice',
    'user_id',

];
public function users(){
    return $this->belongsTo(User::class);
  }

  
}
