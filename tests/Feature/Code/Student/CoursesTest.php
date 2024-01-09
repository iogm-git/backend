<?php

namespace Tests\Feature\Code\Student;

use Tests\CreatesApplication;
use Tests\TestCase;

class CoursesTest extends TestCase
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

    public function test_code_student_courses_get_courses()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/student/course', ['course_id' => [2], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_code_student_courses_get_sections()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/student/section', ['course_id' => [2], 'student_id' => 'student_one']);

        $response->assertStatus(200);
    }

    public function test_code_student_courses_get_lessons()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/student/lesson', ['course_id' => [2], 'student_id' => 'student_one', 'section_id' => 1]);

        $response->assertStatus(200);
    }
}
