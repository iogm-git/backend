<?php

namespace Tests\Feature\Code\Member\Student;

use Tests\CreatesApplication;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use CreatesApplication;

    protected $token;

    public function setUp(): void
    {
        parent::setUp();

        $this->loginUser();
    }

    protected function loginUser()
    {
        $jwtToken = $this->post('user/guest/auth/login', [
            'username' => 'student_one',
            'password' => 'student_one'
        ]);

        $this->token = $jwtToken->json('access_token');
    }

    public function test_get_courses()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/student/course', ['course_id' => [1], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_get_sections()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/student/section', ['course_id' => [1], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_get_lessons()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/student/lesson', ['course_id' => [1], 'student_id' => 'student_one', 'section_id' => 1]);

        $response->assertStatus(200);
    }

    public function test_update_completed_lectures()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/student/completed-lectures', ['course_id' => [1], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_download_certificate()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'shop/member/download/transactions', ['course_id' => [1], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }
}
