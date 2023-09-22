<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'name',
        'hname',
        'status',
        'category_id', 
        'unit_id',
        'default_weight',
        'weights', 
        'image', 
    ];
    public function unit(){
        return $this->belongsTo(Unit::class);
     }
}
