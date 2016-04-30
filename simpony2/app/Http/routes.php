<?php

Route::auth();
	
Route::get('/', function () {
    	// return view('blank');
	return redirect('/home');
});

// harus login
Route::group(['middleware' => 'user'], function () {

	Route::get('/home', function () {
    	return view('blank');
	});
	Route::get('assignments/{Assn_ID}/melihat', 'AssignmentsController@melihat');	
	Route::get('assignments/pelacakan', 'AssignmentsController@pelacakan');
	Route::get('assignments/pekerjaanstaff', 'AssignmentsController@pekerjaanstaff');



});

// minimal staff
Route::group(['middleware' => 'Staff'], function () {
	Route::post('files/create', 'FilesController@handleUpload');
	Route::post('comments/create','CommentsController@create');
	Route::get('assignments/staffpekerjaan', 'AssignmentsController@staffpekerjaan');
	Route::get('assignments/{Assn_ID}/pekerjaanstaff', 'AssignmentsController@staffview');
	Route::get('assignments/staffpekerjaan', 'AssignmentsController@staffpekerjaan');


});

// minimal HG
Route::group(['middleware' => 'HG'], function () {
	Route::get('assignments/hgstaff', 'AssignmentsController@hgstaff');
	Route::get('assignments/{Assn_ID}/managerview', 'AssignmentsController@managerview');
	Route::get('assignments/{Assn_ID}/assignStaff', 'AssignmentsController@assignStaff');
	Route::get('assignments/listAssigned', 'AssignmentsController@listAssigned');
	Route::get('assignments/listAccepted', 'AssignmentsController@listAccepted');
	Route::get('assignments/pekerjaanDept', 'AssignmentsController@pekerjaanDept');

	// flagged
	Route::get('assignments/departmentsAssn', 'AssignmentsController@departmentAssn');
	Route::patch('assignments/update2/{Assn_ID}', 'AssignmentsController@update2');


	Route::resource('steps', 'StepsController');
});

// minimal HoD
Route::group(['middleware' => 'HoD'], function () {
	Route::get('assignments/rejected', 'AssignmentsController@rejected');
	Route::get('assignments/{Assn_ID}/assign', 'AssignmentsController@assign');

});

// minimal GM
Route::group(['middleware' => 'GM'], function () {

});

// Admin
Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', 'UsersController');
	Route::resource('departments', 'DepartmentsController');

});

	Route::resource('notifikasis', 'NotifikasisController');
	Route::resource('assignments', 'AssignmentsController');
		Route::resource('comments', 'CommentsController');