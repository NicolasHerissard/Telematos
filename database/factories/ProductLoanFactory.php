<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductLoan>
 */
class ProductLoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->has(Product::factory()->count(1))->create(),
            'product_id' => Product::factory()->has(User::factory()->count(1))->create(),
            'take_product' => 0,
        ];
    }
}
