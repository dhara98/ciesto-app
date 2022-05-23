<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Shop extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'address',
    ];

    /**
     * One-to-Many relations with todos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HashMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id')
            ->orderBy('created_at');
    }
}
