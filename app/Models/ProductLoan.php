<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_name_product',
        'take_product'
    ];

    public function ProductLoan(): HasMany
    {
        return $this->hasMany(ProductLoan::class);
    }
}
