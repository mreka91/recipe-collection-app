<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProfilePage extends TestCase
{
    use RefreshDatabase;

    public function test_view_profile_page()
    {
        $user = User::factory()->create();
        $response = $this->get("users/$user->id/view");

        $response->assertViewIs('view-profile');
        $response->assertSeeText($user->name);
    }
}
