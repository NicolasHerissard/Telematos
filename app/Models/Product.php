<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    // initialisation des données à créer dans le Controller 
    protected $fillable = [
        'name_product',
        'stock',
        'image_product',
    ];


    // relation produit / utilisateur 
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'product_users');
    }
}
