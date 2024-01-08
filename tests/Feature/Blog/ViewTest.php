<?php

namespace Tests\Feature\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_blog_show_profile()
    {
        $response = $this->get('/blog/show?page=profile');

        $response->assertStatus(200)
            ->assertViewIs('blog.profile');
    }

    // public function test_blog_demo_web()
    // {
    //     $response = $this->get('/blog/demo?category=blog&type=app_a&url=website');

    //     $response->assertStatus(200);
    // }
}
