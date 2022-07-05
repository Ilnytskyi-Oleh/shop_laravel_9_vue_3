<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
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
//         \App\Models\User::factory(10)->create();
//        Tag::factory(15)->create();
//        Category::factory(5)->create();
//        Color::factory(10)->create();
//        Product::factory(10)->create();

        Category::factory()
            ->count(5)
            ->has(Product::factory()
                ->count(10)
                ->has(Tag::factory()->count(2))
                ->has(Color::factory()->count(2)))
            ->create();
    }
}
