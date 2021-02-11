<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
	private $tagData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i=0; $i <5; $i++){
        	$tagData[] = [
        		'name'=>'Tag 1',
        	];
        }

        foreach ($tagData as $tags) {
        	Tag::create($tags);
        }
    }
}
