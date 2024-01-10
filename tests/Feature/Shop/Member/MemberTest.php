<?php

namespace Tests\Feature\Shop\Member;

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
        $jwtToken = $this->post('guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'guest/auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
    }

    public function test_get_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/stash', ['id' => $this->id]);

        $response->assertStatus(422);
    }

    public function test_store_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/stash', ['web_id' => 'w012', 'member_id' => $this->id]);

        $response->assertStatus(200);

        Stash::where('web_id', 'w012')->where('member_id', $this->id)->delete();
    }

    public function test_destroy_stash()
    {
        Stash::create([
            'id' => 2,
            'web_id' => 'w013',
            'member_id' => $this->id
        ]);

        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('delete', 'shop/member/stash', ['id' => 2]);

        $response->assertStatus(200);
    }

    // public function test_status_paid_can_download_web()
    // {
    //     $response = $this
    //         ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
    //         ->json('get', 'shop/member/download/web', ['id' => 2]);

    //     $response->assertStatus(200);
    // }

    public function test_download_transactions_history_pdf()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/download/transactions', ['id' => 2]);

        $response->assertStatus(200);
    }
}
