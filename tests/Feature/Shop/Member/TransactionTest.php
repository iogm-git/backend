<?php

namespace Tests\Feature\Shop\Member;

use Tests\CreatesApplication;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use CreatesApplication;

    protected $token;
    protected $id;

    public function setUp(): void
    {
        parent::setUp();

        $this->token = $this->loginUser();
    }

    // semua test failed karena belum verifikasi email

    protected function loginUser()
    {
        $jwtToken = $this->post('user/guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $jwtToken->json('access_token')])
            ->json('post', 'user/guest/auth/me');

        $this->id = $user->json('id');

        return $jwtToken->json('access_token');
    }

    public function test_information()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/transaction/information', ['id' => $this->id]);

        $response->assertStatus(200);
    }

    // kalo tripay
    // public function test_purchase()
    // {
    //     $response = $this
    //         ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
    //         ->json('post', 'shop/member/transaction/purchase', ['id' => $this->id, 'web' => 'w011', 'amount' => 5]);

    //     $response->assertStatus(200);
    // }


    public function test_history()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/transaction/have-paid', ['id' => $this->id]);

        $response->assertStatus(200);
    }

    public function test_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/transaction/latest-unpaid', ['id' => $this->id]);

        $response->assertStatus(200);
    }
}
