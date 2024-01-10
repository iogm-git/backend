<?php

namespace Tests\Feature\Code\Member\Student;

use Tests\CreatesApplication;
use Tests\TestCase;

class TransactionsTest extends TestCase
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

    public function loginUser()
    {
        $jwtToken = $this->post('guest/auth/login', [
            'username' => 'student_one',
            'password' => 'student_one'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'guest/auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
        $this->username = $user->json('username');
    }

    public function test_store()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/student/transaction', ['student_id' => 'student_one', 'course_id' => 1, 'amount' => 15000]);

        $response->assertStatus(422);
    }
}
