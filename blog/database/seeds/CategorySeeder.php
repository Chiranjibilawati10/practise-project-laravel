<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
	private $categoryData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <1; $i++){
        	$categoryData[] = [
        		'name'=>'category 1',
        	];
        }
        foreach ($categoryData as $category) {
        	Category::create($category);
        }
    }
}
