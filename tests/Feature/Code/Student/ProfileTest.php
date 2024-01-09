<?php

namespace Tests\Feature\Code\Student;

use Tests\CreatesApplication;
use Tests\TestCase;

class ProfileTest extends TestCase
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
        $jwtToken = $this->post('auth/login', [
            'username' => 'student_one',
            'password' => 'student_one'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
        $this->username = $user->json('username');
    }

    public function test_code_student_profile_get_profile()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/student/profile', ['student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_code_student_profile_store_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/code/student/stash', ['student_id' => 'student_one', 'course_id' => 2]);

        $response->assertStatus(422);
    }

    public function test_code_student_profile_destroy_stash()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('delete', '/code/student/stash', ['student_id' => 'student_one', 'course_id' => 111]);

        $response->assertStatus(422);
    }
}
