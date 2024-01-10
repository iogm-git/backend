<?php

namespace Tests\Feature\Code\Member\General;

use Tests\CreatesApplication;
use Tests\TestCase;

class MemberTest extends TestCase
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

    public function test_update_dob_and_address()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/general/dob-address', ['username' => $this->username, 'dob' => null, 'address' => null]);

        $response->assertStatus(200);
    }

    public function test_get_photo_profile()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/general/photo-profile', ['username' => $this->username]);

        $response->assertStatus(200);
    }
}
