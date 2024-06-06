<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory; // Import Factory class
use Illuminate\Support\Facades\DB; // Import DB facade for truncating tables

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the posts table to clear existing data before seeding
        DB::table('posts')->truncate();

        // Use the Post factory to create 15 posts
        Post::factory(15)->create();
    }
}
