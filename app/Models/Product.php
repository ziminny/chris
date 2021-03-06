<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'cost_price' ,
        'sale_price' ,
        'amount',
        'description',
        'user_id' ,
        'name'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class,"categories_products");
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
