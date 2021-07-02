<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,5)->create()->map(function ($cat,$i){
//            dump($cat);
            factory(Product::class,5)->create()->map(function ($product) use($cat,$i){
                dump($cat->id);
                $x = $cat->id;
                $product->category()->associate($x);
            });
        });
    }
}
