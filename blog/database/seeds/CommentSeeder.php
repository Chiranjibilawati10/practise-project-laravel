<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Comment;


class CommentSeeder extends Seeder
{
	private $commentData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user_id = User::first()->value('id');

        for($i=0; $i < 1000; $i++){
        	$commentData[] = [
        		'user_id' => $user_id,
        		'comment' =>  Str::random(10),
        		'commentable_id' => '1'
        	];
        }

        foreach ($commentData as $comments) {
        	Comment::create($comments);
        }
    }
}
