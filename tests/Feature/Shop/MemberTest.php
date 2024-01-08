<?php

namespace Tests\Feature\Shop;

use App\Models\Shop\Member\Stash;
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
        $jwtToken = $this->post('auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
    }

    public function test_shop_member_get_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/shop/member/stash', ['id' => $this->id]);

        $response->assertStatus(422);
    }

    public function test_shop_member_store_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/member/stash', ['web_id' => 'w012', 'member_id' => $this->id]);

        $response->assertStatus(200);

        Stash::where('web_id', 'w012')->where('member_id', $this->id)->delete();
    }

    public function test_shop_member_destroy_stash()
    {
        Stash::create([
            'id' => 2,
            'web_id' => 'w013',
            'member_id' => $this->id
        ]);

        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('delete', '/shop/member/stash', ['id' => 2]);

        $response->assertStatus(200);
    }

    // public function test_shop_member_status_paid_can_download_web()
    // {
    //     $response = $this
    //         ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
    //         ->json('get', '/shop/member/download/web', ['id' => 2]);

    //     $response->assertStatus(200);
    // }

    public function test_shop_member_download_transactions_history_pdf()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/shop/member/download/transactions', ['id' => 2]);

        $response->assertStatus(200);
    }

    public function test_shop_member_upload_new_image()
    {
        // if image not profile svg and want change image from google
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/member/upload-profile-image', ['id' => $this->id, 'image' => base64_encode(file_get_contents(public_path('/test/img.webp')))]);

        $response->assertStatus(200);
    }

    public function test_shop_member_upload_default_image()
    {
        // if image is profile svg
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/member/upload-profile-image', ['id' => $this->id, 'image' => 'profile.svg']);

        $response->assertStatus(200);
    }

    public function test_shop_member_send_mail_otp()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/member/otp/send-mail', ['id' => $this->id, 'email' => 'ilhamrahmat652@gmail.com']);

        $response->assertStatus(200);
    }

    public function test_shop_member_verify_otp()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/shop/member/otp/verify', ['id' => $this->id, 'otp' => '0000']);

        $response->assertStatus(422);
    }

    public function test_shop_member_update_data()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/shop/member/update-data', ['id' => $this->id, 'data' => ['phone' => '081272369357']]);

        $response->assertStatus(200);
    }

    public function test_shop_member_update_authentication()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/shop/member/update-authentication', ['id' => $this->id, 'username' => 'ilhamrhmtkbr', 'name' => 'ilham rahmat akbar']);

        $response->assertStatus(200);
    }
}
