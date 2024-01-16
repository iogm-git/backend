<?php

namespace Tests\Feature\Code\Member\Instructor;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use Tests\CreatesApplication;
use Tests\TestCase;

class StudiesTest extends TestCase
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
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $this->token = $jwtToken->json('access_token');
    }

    public function test_get_studies()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/instructor/studies', ['perPage' => 10]);

        $response->assertStatus(200);
    }

    public function test_get_studies_latest()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/instructor/studies/latest', ['perPage' => 10]);

        $response->assertStatus(200);
    }

    public function test_store_course()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/instructor/course', ['instructor_id' => 'instructor_one', 'title' => 'Javascript', 'description' => 'Description abc', 'price' => 15000]);

        $response->assertStatus(200);

        Courses::where('instructor_id', 'instructor_one')->delete();
    }

    public function test_update_course()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/instructor/course', ['instructor_id' => 'ilhamrhmtkbr', 'title' => 'PHP', 'price' => 15000]);

        $response->assertStatus(422);
    }

    public function test_store_section()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/instructor/section', ['course_id' => 1, 'title' => 'Kubernetes', 'order_in_course' => 1]);

        $response->assertStatus(200);

        Sections::where('title', 'Kubernetes')->delete();
    }

    public function test_update_section()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/instructor/section', ['id' => 1, 'title' => 'PHP Dasar', 'order_in_course' => 1]);

        $response->assertStatus(200);
    }

    public function test_store_lesson()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/instructor/lesson', ['section_id' => 1, 'title' => 'Kubernetes', 'code' => 'asd', 'order_in_section' => 1]);

        $response->assertStatus(200);

        Lessons::where('title', 'Kubernetes')->delete();
    }

    public function test_update_lesson()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/instructor/lesson', ['id' => 1, 'title' => 'String', 'order_in_section' => 1]);

        $response->assertStatus(422);
    }
}
