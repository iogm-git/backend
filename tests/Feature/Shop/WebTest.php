<?php

namespace Tests\Feature\Shop;

use Tests\TestCase;

class WebTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shop_web_details(): void
    {
        $response = $this->json('get', '/shop/web/details');

        $response->assertStatus(200);
    }

    public function test_shop_web_category(): void
    {
        $response = $this->json('get', '/shop/web/category', ['name' => 'blog']);

        $response->assertStatus(200);
    }

    public function test_shop_web_search(): void
    {
        $response = $this->json('get', '/shop/web/search', ['keyword' => 'blog']);

        $response->assertStatus(200);
    }

    public function test_shop_web_categories(): void
    {
        $response = $this->json('get', '/shop/web/categories');

        $response->assertStatus(200);
    }

    public function test_shop_web_show(): void
    {
        $response = $this->json('get', '/shop/web/show', ['category' => 'blog', 'type' => 'app_a']);

        $response->assertStatus(200);
    }
}
