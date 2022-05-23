<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'shop_id',
      'price',
      'stock',	
      'video',
    ];

    /**
     * Has-One relations with Shop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id');
    }  
}
