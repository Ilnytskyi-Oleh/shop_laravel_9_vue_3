<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(10)->create();

        $products = Product::factory(50)->create();

        $tags = Tag::factory(15)->create();
        $colors = Color::factory(10)->create();
        $groups = Group::factory(5)->create();

        foreach ($products as $product){
            ProductImage::factory(3)->create([
                'product_id' => $product->id
            ]);
            $product->tags()->attach($tags->random(rand(1,3)));
            $product->colors()->attach($colors->random(rand(1,4)));
            $product->group_id = rand(0,1) ? null : $groups->random()->id;
            $product->update();
        }
    }
}
