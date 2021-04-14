<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_edit_recipie_form()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        $response = $this->followingRedirects()->actingAs($user)->get('recipes/1/edit');

        $response->assertViewIs('edit-recipe');
        $response->assertSeeText('Title');
    }

    public function test_delete_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => 1]);
        $response = $this->actingAs($user)->delete("recipes/$recipe->id/delete");
        $this->assertDatabaseMissing('recipes', [
            'title' => $recipe->title
        ]);
    }

    public function test_edit_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => 1]);

        $response = $this->actingAs($user)->put('recipes/1/edit', [
            'title' => 'Edit',
            'content' => 'edit',
        ]);

        $this->assertDatabaseHas('recipes', [
            'title' => 'Edit'
        ]);
    }

    public function test_refuse_wrongful_edit()
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => 2]);

        $response = $this->actingAs($user)->put('recipes/1/edit', [
            'title' => 'edited title',
        ]);

        $response->assertUnauthorized();
        $this->assertDatabaseHas('recipes', [
            'title' => $recipe->title,
        ]);
    }

    public function test_refuse_wrongful_delete()
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => 2]);

        $response = $this->actingAs($user)->delete('recipes/1/delete');
        $response->assertUnauthorized();
        $this->assertDatabaseHas('recipes', [
            'title' => $recipe->title,
        ]);
    }
}
