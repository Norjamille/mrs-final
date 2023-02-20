<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_user()
    {
        $response = $this->post('/users', [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }
}
