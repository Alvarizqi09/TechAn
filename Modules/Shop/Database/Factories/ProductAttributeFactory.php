<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\factories\Factory;

class ProductAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = \Modules\Shop\App\Models\ProductAttribute::class;
    

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [];
    }
}

