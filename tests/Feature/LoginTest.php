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

    public function test_view_login_form()
    {
        $response = $this->get('login');
        $response->assertViewIs('login');
        $response->assertSeeText("Email");
    }

    public function test_login_user()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            "email" => $user->email,
            "password" => 'password',
        ]);
        $this->assertAuthenticatedAs($user);
        $response->assertViewIs('index');
        $response->assertSeeText($user->name);
    }

    public function test_login_user_with_wrong_password()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            'email' => $user->email,
            'password' => 'wordpass',
        ]);
        $this->assertGuest();
        $response->assertViewIs('login');
        $response->assertSeeText("Something went wrong");
    }

    public function test_login_user_with_wrong_email()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->post('login', [
            'email' => "typo.$user->email.typo",
            'password' => 'password',
        ]);
        $this->assertGuest();
        $response->assertViewIs('login');
        $response->assertSeeText("Something went wrong");
    }

    public function test_redirect_if_user_is_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->followingRedirects()->actingAs($user)->get('login');
        $response->assertViewIs('index');
        $response->assertSeeText('Home');
    }
}
