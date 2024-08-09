<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Shop\App\Models\ProductImage::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

