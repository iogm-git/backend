<?php

namespace Tests\Feature\Code\Member\Student;

use Tests\CreatesApplication;
use Tests\TestCase;

class TransactionsTest extends TestCase
{
    use CreatesApplication;

    protected $token;

    public function setUp(): void
    {
        parent::setUp();

        $this->loginUser();
    }

    public function loginUser()
    {
        $jwtToken = $this->post('user/guest/auth/login', [
            'username' => 'student_one',
            'password' => 'student_one'
        ]);

        $this->token = $jwtToken->json('access_token');
    }

    public function test_store()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/student/transaction', ['student_id' => 'student_one', 'course_id' => 1]);

        $response->assertStatus(422);
    }
}
