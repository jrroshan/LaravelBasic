<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Post::truncate();

        $users = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $users->id
        ]);

        

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $users->id,
        //     'category_id' => $personal->id,
        //     'title' => "My First Post",
        //     'slug' => "my-first-post",
        //     'excerpt' => 'Lorem ipsum',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, mollitia unde quo, officia ad id tempore animi adipisci quidem non debitis consequatur minus rerum in quaerat? Vitae quam veritatis voluptatibus?'
        // ]);

        // Post::create([
        //     'user_id' => $users->id,
        //     'category_id' => $family->id,
        //     'title' => "My family Post",
        //     'slug' => "my-family-post",
        //     'excerpt' => 'Lorem ipsum2',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, mollitia unde quo, officia ad id tempore animi adipisci quidem non debitis consequatur minus rerum in quaerat? Vitae quam veritatis voluptatibus?'
        // ]);
    }
}
