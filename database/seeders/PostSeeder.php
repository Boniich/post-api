<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post();

        $post->id = 1;
        $post->title = "My First post";
        $post->slug = "Slug of my first post";
        $post->content = "Hello this is my first post in this forum";
        $post->author = "Boniich";
        $post->publish_date = "26/06/2033";
        $post->draf_status = "published";

        $post->save();
    }
}
