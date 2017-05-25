<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
	//Profile
	Route::get('profile', 'UserController@index');
	Route::get('profile/{id}', 'UserController@show');

   //Chức vụ
	Route::get('position', 'PositionController@getlist');
	Route::post('position/add', 'PositionController@postAdd');
	Route::get('position/edit/{id}', 'PositionController@getEdit');
	Route::post('position/edit', 'PositionController@postEdit');
	Route::post('position/delete', 'PositionController@postDelete');

	//Chuyên Môn
	Route::get('jobtype', 'JobTypeController@getlist');
	Route::post('jobtype/add', 'JobTypeController@postAdd');
	Route::get('jobtype/edit/{id}', 'JobTypeController@getEdit');
	Route::post('jobtype/edit', 'JobTypeController@postEdit');
	Route::post('jobtype/delete', 'JobTypeController@postDelete');

	//Phòng Ban
	Route::get('department', 'DepartmentController@getList');
	Route::get('department/add', 'DepartmentController@getAdd');
	Route::post('department/add', 'DepartmentController@postAdd');
	Route::get('department/detail/{id}', 'DepartmentController@getDetail');
	Route::get('department/detail/add-employee/{id}', 'DepartmentController@getAddEmployee');
	Route::post('department/detail/add-employee/{id}', 'DepartmentController@postAddEmployee');
	Route::get('department/detail/edit-employee/{id}', 'DepartmentController@getEditEmployee');
	Route::post('department/detail/edit-employee/{id}', 'DepartmentController@postEditEmployee');
	Route::post('department/edit', 'DepartmentController@postEdit');
	Route::get('department/edit/{id}', 'DepartmentController@getEdit');
	Route::post('department/delete', 'DepartmentController@postDelete');

	//Employee
	Route::get('employee', 'UserController@getList');
	Route::get('employee/add', 'UserController@getAdd');
	Route::post('employee/add', 'UserController@postAdd');
	Route::get('employee/edit/{id}', 'UserController@getEdit');
	Route::post('employee/edit/{id}', 'UserController@postEdit');
	Route::post('employee/delete', 'UserController@postDelete');
});

Route::get('/home', 'HomeController@index');




Route::post('/employee/delete', 'UserController@postDelete');

Route::post('/employee/update', 'UserController@postUpdate');

Route::post('/employee/setting/update', 'UserController@postSettingUpdate');



Route::get('employee/contract', 'ContractController@getList');
Route::get('employee/contract/add', 'ContractController@getAdd');

Route::get('access', function(){
	return view('manage_access.list');
});

Route::get('notification', function(){
	return view('notification.list');
});

Route::get('editnotification', function(){
	return view('notification.edit');
});

Route::get('addnotification', function(){
	return view('notification.add');
});

Route::get('createleave', function(){
	return view('leaves.create');
});

Route::get('leave', function(){
	return view('leaves.list');
});

Route::get('khenthuong', function(){
	return view('khenthuong.list');
});

Route::get('taocongtac', function(){
	return view('congtac.create');
});

Route::get('congtac', function(){
	return view('congtac.list');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'UserController@autocomplete'));


