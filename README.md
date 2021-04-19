# Recipe app

![Recipe](https://media.giphy.com/media/3ohze1W9gqYUDx7l2U/giphy.gif)

## User stories

-   As a user I am able to create an account
-   As a user I am able to login
-   As a user I am able to logout
-   As a user I am able to create a new recipe with title, description and image
-   As a user I am able to edit my recipe
-   As a user I am able to delete my recipe
-   As a user I am able to comment on recipes
-   As a user I am able to view my profil and my recipes
-   As a user I am able to view others profiles and their recipes

## Install instructions

1. Clone this repo
2. cd into the project directory
3. Configure your `.env` file
4. Run the following commands:
    1. `composer update`
    2. `npm install`
    3. `php artisan migrate`
    4. `php artisan storage:link`
    5. `npm run build`
    6. `php artisan key:generate`
5. Run `php artisan serve` & `npm run watch` and open the app in your web-browser of choice.

## Code review

-   You need to add run 'npx mix' in your installation guide, or the CSS won't load.
-   Uploaded images stretch and become hard to see on medium-to-large screens.
-   Instead of using multiple controlls for things like DeleteComment and AddComment you could create a CommentController that handles both. (Also applies to create/delete recipe-controllers).
-   In DeleteCommentController.php you have two return calls on top of each other, of which the redirect one won't run ever.
-   EditRecipeController should just be RecipeController since it holds multiple functions.
-   Inside hrefs you can use the route-helper e.g {{ route('user.view', $id) }} to generate URL's based on the route file.
-   Nice indentation
-   Nice use of tailwind
-   Great use of view components
-   You should wrap authenticated routes in middleware groups so that you don't need to repeat the code.
-   The create-recipe route could be recipes/create to match the other recipe routes (just for consistency).
-   You could try to name routes with ->name('') for redirects and the routes helper.
-   I found a typo in CreateRecipeTest.php on line 23.
-   You could combine the test files for recipes, similarly as with controllers.
-   Overall the code looks really clean, can't find much to critique.
-   Good job!

## Made by

-   Simon Lindstedt
-   Réka Madarász
