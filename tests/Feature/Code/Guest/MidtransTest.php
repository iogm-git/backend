<?php

namespace Tests\Feature\Code\Guest;

use Tests\TestCase;

class MidtransTest extends TestCase
{
    public function test_callback()
    {
        $response = $this
            ->json('post', 'code/midtrans/callback', ['status_code' => 500]);

        $response->assertStatus(422);
    }
}
