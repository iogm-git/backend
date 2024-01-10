<?php

namespace Tests\Feature\Code\Member\General;

use Tests\CreatesApplication;
use Tests\TestCase;

class DiscussionForumsTest extends TestCase
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
        $jwtToken = $this->post('guest/auth/login', [
            'username' => 'ilhamrhmtkbr',
            'password' => 'ilham25'
        ]);

        $user = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'guest/auth/me');

        $this->token = $jwtToken->json('access_token');
        $this->id = $user->json('id');
        $this->username = $user->json('username');
    }

    public function test_get_discussion_forums()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/general/discussion-forums', ['course_id' => 1]);

        $response->assertStatus(200);
    }

    public function test_store_discussion_forums()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('post', 'code/member/general/discussion-forums', ['message' => 'anjing']);

        $response->assertStatus(422);
    }

    public function test_get_discussion_forums_categories()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->json('get', 'code/member/general/discussion-forums/categories');

        $response->assertStatus(200);
    }
}
