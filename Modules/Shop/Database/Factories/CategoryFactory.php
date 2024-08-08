<?php

namespace Modules\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = \Modules\Shop\App\Models\Category::class;

    /**
     * Define the model's default state.
     * 
     * @return array
     */
    public function definition()
    {
        $name = fake()->sentence(2);

        return [
            'slug' => Str::slug($name),
            'name' => $name,
        ];
    }
}

