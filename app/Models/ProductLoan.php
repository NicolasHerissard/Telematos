<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'take_product'
    ];

    public function ProductLoan(): HasMany
    {
        return $this->hasMany(ProductLoan::class);
    }
}
