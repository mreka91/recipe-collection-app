<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_signup_form()
    {
        $response = $this->get('login');
        $response->assertViewIs('login');
        $response->assertSeeText("Email");
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            "email" => $user->email,
            "password" => 'password',
        ]);
        $response->assertViewIs('index');
        $response->assertSeeText("Hello $user->name!");
    }

    public function test_login_user_with_wrong_password()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            'email' => $user->email,
            'password' => 'wordpass',
        ]);
        $response->assertViewIs('login');
        $response->assertSeeText("Something went wrong");
    }

    public function test_login_user_with_wrong_email()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            'email' => "typo$user->email.typo",
            'password' => 'password',
        ]);
        $response->assertViewIs('login');
        $response->assertSeeText("Something went wrong");
    }

    public function test_redirect_if_user_is_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('login');
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}
