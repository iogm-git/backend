<?php

namespace Tests\Feature\Shop;

use Tests\CreatesApplication;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use CreatesApplication;

    protected $token;

    public function setUp(): void
    {
        parent::setUp();

        $this->token = $this->loginUser();
    }

    protected function loginUser()
    {
        $response = $this->post('auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        return $response->json('access_token');
    }

    public function test_shop_transaction_member()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/transaction/member', ['username' => 'ilhamrhmtkbr']);

        $response->assertStatus(200);
    }

    public function test_shop_transaction_purchase()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/transaction/purchase', ['username' => 'ilhamrhmtkbr', 'web' => 'w011', 'amount' => 5]);

        $response->assertStatus(422);
    }


    public function test_shop_transaction_history()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/transaction/history', ['username' => 'ilhamrhmtkbr']);

        $response->assertStatus(200);
    }

    public function test_shop_transaction_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/transaction/latest', ['username' => 'ilhamrhmtkbr']);

        // $this->assertNotEmpty($response['data']);
        $response->assertStatus(200);
    }
}
