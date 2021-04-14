<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignupTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_signup_form()
    {
        $response = $this->get('signup');
        $response->assertViewIs('signup');
        $response->assertSeeText('Username');
    }

    public function test_signup_and_login_new_user()
    {
        $username = "newUser";
        $email = "newUser@test.se";
        $password = "password";

        $response = $this->followingRedirects()->post('signup', [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);

        $this->assertAuthenticated();

        $response->assertViewIs('index');
        $response->assertSeeText($username);
    }


    public function test_signup_with_incorrect_input()
    {
        $this->followingRedirects()->get('signup');
        $response = $this->followingRedirects()->post('signup', [
            'username' => "",
        ]);

        $this->assertDatabaseMissing('users', [
            "username" => "",
        ]);

        $this->assertGuest();
        $response->assertViewIs('signup');
        $response->assertSeeText('The username field is required');
    }
}
