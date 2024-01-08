<?php

namespace Tests\Feature\Code\Instructor;

use App\Models\Code\Instructor\Studies\Courses;
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

    public function test_code_instructor_studies_get_course()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/instructor/course');

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
}
