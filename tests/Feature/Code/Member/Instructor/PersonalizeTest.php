<?php

namespace Tests\Feature\Code\Member\Instructor;

use Tests\CreatesApplication;
use Tests\TestCase;

class PersonalizeTest extends TestCase
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

    public function test_get_data_personalization()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/instructor/data-personalization');

        $response->assertStatus(200);
    }

    public function test_store_answer_questions()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/instructor/answer-questions', ['answer' => 'anjing']);

        $response->assertStatus(422);
    }

    public function test_update_answer_questions()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('put', 'code/member/instructor/answer-questions', ['question_id' => 1, 'instructor_id' => 'ilhamrhmtkbr', 'answer' => 'answer_one']);

        $response->assertStatus(200);
    }
}
