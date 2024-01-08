<?php

namespace Tests\Feature\Code\Instructor;

use Tests\CreatesApplication;
use Tests\TestCase;

class PersonalizeTest extends TestCase
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

    public function test_code_instructor_personalize_get_data_personalization()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', '/code/instructor/data-personalization');

        $response->assertStatus(200);
    }

    public function test_code_instructor_personalize_store_answer_questions()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', '/code/instructor/answer-questions', ['answer' => 'anjing']);

        $response->assertStatus(422);
    }

    public function test_code_instructor_personalize_update_answer_questions()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', '/code/instructor/answer-questions', ['question_id' => 1, 'instructor_id' => 'ilhamrhmtkbr', 'answer' => 'answer_one']);

        $response->assertStatus(200);
    }
}
