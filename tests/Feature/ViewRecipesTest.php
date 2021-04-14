<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewRecipesTest extends TestCase
{
    use RefreshDatabase;
    public function test_view_index_page()
    {
        $response = $this->get('/');
        $response->assertViewIs('index');
        $response->assertSeeText('Home');
    }

    public function test_view_recipe_page()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get('recipes/1/view');
        $response->assertViewIs('view-recipe');
        $response->assertSeeText($recipe->title);
    }
}
