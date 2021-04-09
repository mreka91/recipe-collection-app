<?php

namespace Tests\Feature;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use RefreshDatabase;
    public function test_image_upload()
    {
        // Storage::fake('test');
        // $picture = UploadedFile::fake()->image('food.jpg');
        $user = User::factory()->create();
        $title = "Test";
        $content = "test";

        $response = $this->actingAs($user)->post('/create-recipe', [
            "title" => $title,
            "content" => $content,
            // "image" => $picture,
        ]);

        // Storage::disk('test')->assertExists("images/" . $picture->hashName());
    }
}
