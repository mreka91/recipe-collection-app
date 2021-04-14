<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;
    public function test_add_comment()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();

        $response = $this->followingRedirects()->actingAs($user)->post("recipes/$recipe->id/comment", [
            'comment' => "Hello!",
        ]);

        $this->assertDatabaseHas('comments', [
            'comment' => "Hello!",
            'recipe_id' => $recipe->id,
        ]);
    }
    public function test_delete_comment()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id, 'recipe_id' => $recipe->id]);

        $response = $this->followingRedirects()->actingAs($user)->delete("comments/$comment->id/delete");

        $this->assertDatabaseMissing('comments', [
            'comment' => $comment->comment,
        ]);
    }
    public function test_view_comments()
    {
        $comment = Comment::factory()->create();

        $response = $this->get("recipes/$comment->recipe_id/view");
        $response->assertviewIs("view-recipe");
        $response->assertSeeText($comment->comment);
    }
    public function test_wrongful_delete()
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => 2]);

        $response = $this->followingRedirects()->actingAs($user)->delete("comments/$comment->id/delete");
        $response->assertUnauthorized();
        $this->assertDatabaseHas('comments', [
            'comment' => $comment->comment,
        ]);
    }
}
