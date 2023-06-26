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
        $post1 = new Post();

        $post1->id = 1;
        $post1->title = "My First post";
        $post1->slug = "Slug of my first post";
        $post1->content = "Hello this is my first post in this forum";
        $post1->author = "Boniich";
        $post1->publish_date = "26-06-2026";
        $post1->draf_status = "published";

        $post1->save();


        $post2 = new Post();

        $post2->id = 2;
        $post2->title = "My second post";
        $post2->slug = "Slug of my second post";
        $post2->content = "Hello this is my second post in this forum";
        $post2->author = "Boniich";
        $post2->publish_date = "12-12-2000";
        $post2->draf_status = "published";

        $post2->save();


        $post3 = new Post();

        $post3->id = 3;
        $post3->title = "My third post";
        $post3->slug = "Slug of my third post";
        $post3->content = "Hello this is my third post in this forum";
        $post3->author = "Boniich";
        $post3->publish_date = "9-06-2021";
        $post3->draf_status = "published";

        $post3->save();



        $post4 = new Post();

        $post4->id = 4;
        $post4->title = "My fourth post";
        $post4->slug = "Slug of my fourth post";
        $post4->content = "Hello this is my fourth post in this forum";
        $post4->author = "Boniich";
        $post4->publish_date = "4-01-2015";
        $post4->draf_status = "published";

        $post4->save();
    }
}
