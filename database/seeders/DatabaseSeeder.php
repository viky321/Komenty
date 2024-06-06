<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Truncate tables to clear existing data (ak je to potrebné)
    User::truncate();
    Post::truncate();
    Comment::truncate(); // (Ak je to potrebné)

    // Vytvorte 5 používateľov a pre každého z nich vytvorte 5 príspevkov
    User::factory(5)->create()->each(function ($user) {
        for ($i = 0; $i < 5; $i++) {
            $post = $user->posts()->save(Post::factory()->make());

            // Ak máte aj model pre komentáre a chcete pre každý príspevok vytvoriť komentár, môžete to urobiť tu
             $post->comments()->save(Comment::factory()->make());
        }
    });

    }
}




