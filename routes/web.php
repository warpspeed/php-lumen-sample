<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {

	$tasks = \App\Task::orderBy('created_at', 'desc')->get();

	return view('index', ['tasks' => $tasks]);
});

$app->post('tasks/{id}/toggle-complete',	'App\Http\Controllers\TaskController@toggleComplete');
$app->post('tasks',				'App\Http\Controllers\TaskController@create');
$app->post('tasks/clear-complete',		'App\Http\Controllers\TaskController@clearComplete');
