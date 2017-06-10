<?php

// Change here.

$app->get('/', function () use ($app)
{
    return $app->version();
});

$app->group(['prefix' => 'api/v1'], function () use ($app)
{
    // Authentication

    $app->post('authentication', 'AuthenticationController@login');
});

$app->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () use ($app)
{
    // Users

    $app->get('users', 'UserController@index');

    $app->post('users', 'UserController@create');

    // Sensor Types

    $app->get('sensorTypes', 'SensorTypeController@index');

    // Sensors

    $app->get('sensors', 'SensorController@index');

    $app->post('sensors', 'SensorController@create');

    $app->put('sensors/{id:\d+}', 'SensorController@update');

    $app->delete('sensors/{id:\d+}', 'SensorController@delete');
});

?>