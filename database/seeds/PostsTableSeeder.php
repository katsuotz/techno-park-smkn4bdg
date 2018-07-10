<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('id_ID');

    	for ($i = 0; $i < 5; $i++) { 
    		Post::create([
    			'title' => $faker->sentence,
    			'content' => $faker->paragraphs(3, true),
    			'image' => 'storage/images/post/image1.jpg'
    		]);
    	}
    }
}
