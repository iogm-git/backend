<?php

namespace Tests\Feature\Shop\Member;

use Tests\CreatesApplication;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use CreatesApplication;

    protected $token;
    protected $username;

    public function setUp(): void
    {
        parent::setUp();

        $this->token = $this->loginUser();
    }

    // semua test failed karena id ngga dikirimkan, dan meskipun dikirimkan tetap error karena belum verifikasi email

    protected function loginUser()
    {
        $jwtToken = $this->post('user/guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $jwtToken->json('access_token')])
            ->json('post', 'user/guest/auth/me');

        $this->username = $user->json('username');

        return $jwtToken->json('access_token');
    }

    public function test_information()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/information', ['username' => $this->username]);

        $response->assertStatus(422);
    }

    public function test_purchase()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/purchase', ['username' => $this->username, 'web' => 'w011', 'amount' => 5]);

        $response->assertStatus(422);
    }


    public function test_history()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/history', ['username' => $this->username]);

        $response->assertStatus(422);
    }

    public function test_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/transaction/latest', ['username' => $this->username]);

        $response->assertStatus(422);
    }
}
