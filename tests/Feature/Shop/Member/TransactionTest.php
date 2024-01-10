<?php

namespace Tests\Feature\Shop\Member;

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
        $response = $this->post('guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        return $response->json('access_token');
    }

    public function test_information()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/information', ['username' => 'ilhamrhmtkbr']);

        $response->assertStatus(200);
    }

    public function test_purchase()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/purchase', ['username' => 'ilhamrhmtkbr', 'web' => 'w011', 'amount' => 5]);

        $response->assertStatus(422);
    }


    public function test_history()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/history', ['username' => 'ilhamrhmtkbr']);

        $response->assertStatus(200);
    }

    public function test_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/latest', ['username' => 'ilhamrhmtkbr']);

        // $this->assertNotEmpty($response['data']);
        $response->assertStatus(200);
    }
}
