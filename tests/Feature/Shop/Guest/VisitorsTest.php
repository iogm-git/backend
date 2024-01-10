<?php

namespace Tests\Feature\Shop\Guest;

use Tests\TestCase;

class VisitorsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_web_details(): void
    {
        $response = $this->json('get', 'shop/guest/web/details');

        $response->assertStatus(200);
    }

    public function test_web_category(): void
    {
        $response = $this->json('get', 'shop/guest/web/category', ['name' => 'blog']);

        $response->assertStatus(200);
    }

    public function test_web_search(): void
    {
        $response = $this->json('get', 'shop/guest/web/search', ['keyword' => 'blog']);

        $response->assertStatus(200);
    }

    public function test_web_categories(): void
    {
        $response = $this->json('get', 'shop/guest/web/categories');

        $response->assertStatus(200);
    }

    public function test_web_show(): void
    {
        $response = $this->json('get', 'shop/guest/web/show', ['category' => 'blog', 'type' => 'app_a']);

        $response->assertStatus(200);
    }
}
