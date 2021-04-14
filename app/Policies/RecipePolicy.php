<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Recipe $recipe)
    {
        return (int)$user->id === (int)$recipe->user_id ? Response::allow() : Response::deny("Not your recipe");
    }

    public function delete(User $user, Recipe $recipe)
    {
        return (int)$user->id === (int)$recipe->user_id ? Response::allow() : Response::deny("Not your recipe");
    }
}
