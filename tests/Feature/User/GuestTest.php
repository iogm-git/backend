<?php

namespace Tests\Feature\User;

use App\Models\User\Member;
use Tests\CreatesApplication;
use Tests\TestCase;

class GuestTest extends TestCase
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
        $response = $this->post('user/guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        return $response->json('access_token');
    }

    public function test_auth_google()
    {
        $response = $this->post('user/guest/auth/google', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $response->assertStatus(422);
    }

    public function test_auth_register(): void
    {
        $response = $this->post('user/guest/auth/register', [
            'username' => 'user1',
            'password' => 'P4sw0rd!',
            'password_confirmation' => 'P4sw0rd!',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('member_data', [
            'username' => 'user1',
        ]);

        Member::where('username', 'user1')->delete();
    }

    public function test_auth_login(): void
    {
        $response = $this->post('user/guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in',
        ]);
    }

    public function test_auth_me(): void
    {
        $authenticatedResponse = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/guest/auth/me');

        $authenticatedResponse->assertStatus(200);
    }

    public function test_auth_logout(): void
    {
        $authenticatedResponse = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/guest/auth/logout');

        $authenticatedResponse->assertStatus(200);
    }
}
