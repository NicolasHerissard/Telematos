<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductUser extends Model
{
    use HasFactory;

    protected $table = 'product_users';

    public $primaryKey = 'id';

    public $timestamps = false;

    // initialisation des données à créer dans le Controller 
    protected $fillable = [
        'user_id',
        'product_id',
        'take_product'
    ];

    // relation 
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_users', 'product_id', 'take_product');
    }
}
