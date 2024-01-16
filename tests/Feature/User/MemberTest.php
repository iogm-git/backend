<?php

namespace Tests\Feature\User;

use Tests\CreatesApplication;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use CreatesApplication;

    protected $token;
    protected $id;

    public function setUp(): void
    {
        parent::setUp();

        $this->loginUser();
    }

    protected function loginUser()
    {
        $jwtToken = $this->post('user/guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $jwtToken->json('access_token')])
            ->json('post', 'user/guest/auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
    }

    public function test_upload_new_image()
    {
        // if image not profile svg and want change image from google
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/member/upload-profile-image', ['id' => $this->id, 'image' => base64_encode(file_get_contents(public_path('/test/img.webp')))]);

        $response->assertStatus(200);
    }

    public function test_upload_default_image()
    {
        // if image is profile svg
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/member/upload-profile-image', ['id' => $this->id, 'image' => 'profile.svg']);

        $response->assertStatus(200);
    }

    public function test_send_mail_otp()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/member/otp/send-mail', ['id' => $this->id, 'email' => 'ilhamrahmat652@gmail.com']);

        $response->assertStatus(200);
    }

    public function test_verify_otp()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'user/member/otp/verify', ['id' => $this->id, 'otp' => '0000']);

        $response->assertStatus(422);
    }

    public function test_update_data()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'user/member/update-data', ['id' => $this->id, 'data' => ['phone' => '081272369357']]);

        $response->assertStatus(200);
    }

    public function test_update_authentication()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'user/member/update-authentication', ['id' => $this->id, 'username' => 'ilhamrhmtkbr', 'name' => 'ilham rahmat akbar']);

        $response->assertStatus(200);
    }
}
