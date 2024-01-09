<?php

namespace Tests\Feature\Code\Instructor;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use Tests\CreatesApplication;
use Tests\TestCase;

class StudiesTest extends TestCase
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
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
        $this->username = $user->json('username');
    }

    public function test_code_instructor_studies_get_studies()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/instructor/studies', ['perPage' => 10]);

        $response->assertStatus(200);
    }

    public function test_code_instructor_studies_get_studies_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/instructor/studies/latest', ['perPage' => 10]);

        $response->assertStatus(200);
    }

    public function test_code_instructor_studies_store_course()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/code/instructor/course', ['instructor_id' => 'instructor_one', 'title' => 'Javascript', 'description' => 'Description abc', 'price' => 15000]);

        $response->assertStatus(200);

        Courses::where('instructor_id', 'instructor_one')->delete();
    }

    public function test_code_instructor_studies_update_course()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/code/instructor/course', ['instructor_id' => 'ilhamrhmtkbr', 'title' => 'PHP', 'price' => 15000]);

        $response->assertStatus(422);
    }

    public function test_code_instructor_studies_store_section()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/code/instructor/section', ['course_id' => 1, 'title' => 'Kubernetes', 'order_in_course' => 1]);

        $response->assertStatus(200);

        Sections::where('title', 'Kubernetes')->delete();
    }

    public function test_code_instructor_studies_update_section()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/code/instructor/section', ['id' => 1, 'title' => 'PHP Dasar', 'order_in_course' => 1]);

        $response->assertStatus(200);
    }

    public function test_code_instructor_studies_store_lesson()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/code/instructor/lesson', ['section_id' => 1, 'title' => 'Kubernetes', 'code' => 'asd', 'order_in_section' => 1]);

        $response->assertStatus(200);

        Lessons::where('title', 'Kubernetes')->delete();
    }

    public function test_code_instructor_studies_update_lesson()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/code/instructor/lesson', ['id' => 1, 'title' => 'String', 'order_in_section' => 1]);

        $response->assertStatus(422);
    }
}
