<?php

namespace App\Providers;

use App\Models\Recipe;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Policies\RecipePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Recipe::class => RecipePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-recipe', [RecipePolicy::class, 'update']);
        Gate::define('delete-recipe', [RecipePolicy::class, 'delete']);
        Gate::define('delete-comment', [CommentPolicy::class, 'delete']);
        //
    }
}
