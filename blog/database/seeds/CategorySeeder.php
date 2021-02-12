<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//custom category name
        $categories = ['sports','politics','entertainment'];

        foreach($categories as $category){
            factory(App\Category::class)->create([
                'name' => $category
            ]);
        }
    }
}
