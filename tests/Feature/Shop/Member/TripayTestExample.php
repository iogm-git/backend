<?php

namespace Tests\Feature\Shop;

use App\Models\Shop\Member\Transactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class TripayTestExample extends TestCase
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

    public function test_shop_member_tripay_banks()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/tripay/banks');

        $response->assertJsonFragment(['success' => true]);
    }

    public function test_shop_member_tripay_payment()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'shop/member/tripay/payment', ['id' => 1, 'web' => 'w011', 'amount' => 50000, 'bank' => 'ALFAMART', 'name' => 'ilham rahmat', 'email' => 'ilhamrhmt@gmail.com']);

        $response->assertJsonFragment(['success' => true]);
    }

    public function test_shop_member_tripay_detail()
    {
        $ref = Transactions::find(1)->first()->reference_tripay;
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer' . $this->token])
            ->json('post', 'shop/member/tripay/detail', ['reference_tripay' => $ref]);

        $response->assertJsonFragment(['success' => true]);
    }

    // test_shop_member_tripay_callback
    /**
    - laravel : php artisan serve
    - ngrok : ngrok authtoken
    - ngrok : ngrok http 8000
    - copy di simulator tripay callback : http://your-subdomain.ngrok-free.app/api/tripay/callback
    - ubah status menjadi 'PAID'
     */
}
