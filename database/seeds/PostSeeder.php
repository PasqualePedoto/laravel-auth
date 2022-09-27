<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
// use Faker\Generation as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            $new_post = new Post();

            // $new_post->title = $faker->sentence();
            // $new_post->content = $faker->paragraph(2);
            // $new_post->title = $faker->imageUrl('animals',true);


            $new_post->title = "titolo a caso";
            $new_post->content = "content a caso";
            $new_post->image = "https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=";

            $new_post->save();
        }
    }
}
