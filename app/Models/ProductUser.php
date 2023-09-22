<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductUser extends Model
{
    use HasFactory;

    // initialisation des données à créer dans le Controller 
    protected $fillable = [
        'user_id',
        'product_id',
        'take_product'
    ];

    // relation 
    public function ProductUser(): HasMany
    {
        return $this->hasMany(ProductLoan::class);
    }
}
