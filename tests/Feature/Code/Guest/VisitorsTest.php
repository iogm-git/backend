<?php

namespace Tests\Feature\Code\Guest;

use Tests\CreatesApplication;
use Tests\TestCase;

class VisitorsTest extends TestCase
{
    use CreatesApplication;

    protected $token;
    protected $id;
    protected $username;

    public function setUp(): void
    {
        parent::setUp();

        $this->loginUser();
    }

    protected function loginUser()
    {
        $jwtToken = $this->post('guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'guest/auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
        $this->username = $user->json('username');
    }

    public function test_register()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/guest/visitor/register', ['username' => $this->username, 'role' => 'instructor']);

        $response->assertStatus(200);
    }

    public function test_search_course()
    {
        $response = $this->json('get', 'code/guest/visitor/search-course', ['title' => 'PHP']);

        $response->assertStatus(200);
    }

    public function test_verify_certificate()
    {
        $response = $this->json('get', 'code/guest/visitor/verify-certificate', ['id' => '1']);

        $response->assertStatus(422);
    }
}
