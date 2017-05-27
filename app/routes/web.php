<?php

// Change here.

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/v1'], function($app)
{
    $app->get('users','UserController@index');

    $app->post('users','UserController@createUser');
});

?>