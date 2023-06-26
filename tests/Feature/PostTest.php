<?php

namespace Tests\Feature;

use Database\Seeders\PostSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    private string $path = 'api/v1/posts';

    public function test_retrived_all_posts_successfully(): void
    {
        $this->seed(PostSeeder::class);
        $response = $this->get($this->path);

        $response->assertJsonStructure(['success', 'message'])->assertStatus(200);
    }

    public function test_retrived_one_post_by_id_successfully(): void
    {
        $this->seed(PostSeeder::class);
        $response = $this->get($this->path . '/1');

        $response->assertJson(['success' => true, 'data' => ['id' => 1], 'message' => 'Post retrived successfully'])->assertStatus(200);
    }

    public function test_not_found_one_post_by_id(): void
    {
        $this->seed(PostSeeder::class);
        $response = $this->get($this->path . '/5');

        $response->assertJson(['success' => false, 'error' => 'Post not found'])->assertStatus(404);
    }

    public function test_store_a_new_post_succesfully()
    {
        $response = $this->post($this->path, [
            'id' => 5,
            'title' => 'test post',
            'slug' => 'test slug',
            'content' => 'test content',
            'author' => 'test author',
            'publish_date' => 'test publish_date',
            'draf_status' => 'draf_status'
        ]);

        $response->assertJson(['success' => true, 'data' => ['id' => 5, 'title' => 'test post'], 'message' => 'Post created successfully'])->assertStatus(201);
    }

    public function test_bad_request_at_store_a_new_post()
    {

        $response = $this->post($this->path, [
            'id' => 2,
            'title' => 'test post',
            'slug' => 'test slug',
        ]);

        $response->assertJson(['success' => false, 'error' => 'Bad request'])->assertStatus(400);
    }

    public function test_update_a_post_successfully()
    {
        $this->seed(PostSeeder::class);
        $response = $this->put($this->path . '/1', [
            'title' => 'updating test row',
            'slug' => 'slug updated',
        ]);

        $response->assertJson([
            'success' => true,
            'data' => ['id' => 1, 'title' => 'updating test row', 'slug' => 'slug updated'],
            'message' => 'Post updated successfully'
        ])->assertStatus(200);
    }

    public function test_not_found_post_to_update()
    {
        $response = $this->put($this->path . '/5', [
            'title' => 'updating test row',
            'slug' => 'slug updated',
        ]);

        $response->assertJson(['success' => false, 'error' => 'Post not found'])->assertStatus(404);
    }

    public function test_delete_post_successfully()
    {
        $this->seed(PostSeeder::class);
        $response = $this->delete($this->path . '/1');

        $response->assertJson(['success' => true, 'data' => ['id' => 1, 'title' => 'My First post'], 'message' => 'Post deleted successfully'])->assertStatus(200);
    }

    public function test_not_found_post_to_delete()
    {
        $response = $this->delete($this->path . '/5');

        $response->assertJson(['success' => false, 'error' => 'Post not found'])->assertStatus(404);
    }
}
