<?php

namespace Modules\Shop\Database\Seeders;

use Modules\Shop\App\Models\ProductAttribute;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Modules\Shop\App\Models\Attribute;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Tag;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\ProductInventory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $user = User::first();

        Attribute::setDefaultAttributes();
        $this->command->info('Default attributes created');
        $attributeWeight = Attribute::where('code',Attribute::ATTR_WEIGHT)->first();

        Category::factory()->count(5)->create();
        $this->command->info('Categories created');
        $randomCategoryIDs = Category::all()->random(2)->pluck('id');

        Tag::factory(10)->count(5)->create();
        $this->command->info('Tags created');
        $randomTagIDs = Tag::all()->random(2)->pluck('id');

        for($i=1; $i<=10; $i++) {
            $manageStock = (bool)random_int(0,1);
            
            $product = Product::factory()->create([
                'user_id' => $user->id,
                'manage_stock' => $manageStock,
            ]);

            $product->categories()->sync($randomCategoryIDs->toArray());

            $product->tags()->sync($randomTagIDs->toArray());

            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $attributeWeight->id,
                'integer_value' => random_int(200,2000), //gram
            ]);

            if($manageStock){
                ProductInventory::create([
                    'product_id' => $product->id,
                    'qty' => random_int(3,20),
                    'low_stock_threshold' => random_int(1,3),
                ]);
            }
        }

        $this->command->info('Products created');
    }
}
