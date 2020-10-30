<?php
    /** @var \Laravel\Lumen\Routing\Router $router */
    /*
    |---------------------------------------------------------------------
    -----
    | Application Routes
    |---------------------------------------------------------------------
    -----
    |
    | Here is where you can register all of the routes for an application.
    | It is a breeze. Simply tell Lumen the URIs it should respond to
    | and give it the Closure to call when that URI is requested.
    |
    */
    $router->get('/', function () use ($router) {
    return "Welcome Traveler!";
    });


    // GET ALL THE USERS
    $router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',
    ['uses' => 'UserController@getUsers']);
    });


    // LOGIN
    $router->get('login', [ 'as' => 'login', 'uses' => 'UserController@login'] );
 
    $router->post('verifyUser', [ 'as' => 'verifyUser', 'uses' => 'UserController@verifyUser']);


    //ADD USER
    $router->post('addUser', [ 'as' => 'addUser', 'uses' => 'UserController@addUser']);

    // SEARCH USER

    $router->get('{id}', [ 'as' => 'searchUser', 'uses' => 'UserController@searchUser']);

    // UPDATE USER
    $router->put('{id}', [ 'as' => 'updateUser', 'uses' => 'UserController@updateUser']);

    // DELETE USER

    $router->delete('{id}', [ 'as' => 'deleteUser', 'uses' => 'UserController@deleteUser']);
    
?>

