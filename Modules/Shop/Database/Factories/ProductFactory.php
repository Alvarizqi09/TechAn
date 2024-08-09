<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\factories\Factory;

use Illuminate\Support\Str;

use Modules\Shop\App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Shop\App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = fake()->words(2, true);

        return [
			'sku' => fake()->isbn10,
			'type' => Product::SIMPLE,
			'name' => $name,
			'slug' => Str::slug($name),
			'price' => fake()->randomFloat,
			'status' => Product::ACTIVE,
            'publish_date' => now(),
            'excerpt' => fake()->text(),
            'body' => fake()->text(),
        ];
    }
}

