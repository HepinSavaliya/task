<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'last_price','feature_image', 'description'];

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

}
