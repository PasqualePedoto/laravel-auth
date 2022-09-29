<?php

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_post = new Post();

            $categories_ids = Category::pluck('id')->toArray();
            $users_ids = User::pluck('id')->toArray();

            $new_post->title = $faker->sentence();
            $new_post->user_id = Arr::random($users_ids);
            $new_post->content = $faker->paragraph(2);
            $new_post->image = $faker->word('animals',true);
            $new_post->category_id = Arr::random($categories_ids);

            $new_post->save();
        }
    }
}
