<?php

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

// Route::get('admin', function () {
//     return view('admin_template');
// });

// Route::get('test', 'TestController@index');

	
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
    	return view('blank');
	});

	Route::resource('departments', 'DepartmentsController');
	
});

Route::group(['middleware' => ['web']], function () {
	Route::get('assignments/rejected', 'AssignmentsController@rejected');

	Route::get('assignments/test', function () {
    	return view('assignments2.index');
	});

	Route::get('assignments/listAssigned', 'AssignmentsController@listAssigned');
	Route::get('assignments/listAccepted', 'AssignmentsController@listAccepted');
	Route::get('assignments/{Assn_ID}/assignStaff', 'AssignmentsController@assignStaff');
	Route::get('assignments/{Assn_ID}/assign', 'AssignmentsController@assign');
	Route::get('assignments/pelacakan', 'AssignmentsController@pelacakan');
	Route::resource('assignments', 'AssignmentsController');
	Route::post('comments', 'CommentsController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('steps', 'StepsController');
});

	Route::auth();