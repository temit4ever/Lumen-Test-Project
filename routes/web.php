<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Adding more route
$router->group([
    'prefix' => 'api/v1',
    'namespace' => 'App\Http\Controllers'
], function ($router) {
    $router->post('blog_post/add', 'BlogPostsController@createBlogPosts');
    $router->get('blog_post/view/{id}', 'BlogPostsController@viewBlogPosts');
    $router->put('blog_post/edit/{id}', 'BlogPostsController@updateBlogPosts');


    $router->delete('blog_post/delete/{id}', 'BlogPostsController@deleteBlogPosts');

    $router->get('blog_post/index', 'BlogPostsController@index');


});
