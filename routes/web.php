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

Route::get('/home', 'HomeController@index');

Route::get('profile', 'UserController@index');

Route::get('profile/{id}', 'UserController@show');

Route::get('/employee', 'UserController@getList');

Route::post('/employee/delete', 'UserController@postDelete');

Route::post('/employee/update', 'UserController@postUpdate');

Route::post('/employee/setting/update', 'UserController@postSettingUpdate');

Route::get('/employee/add', 'UserController@getAdd');
Route::post('/employee/add', 'UserController@postAdd');

Route::get('employee/contract', 'ContractController@getList');
Route::get('employee/contract/add', 'ContractController@getAdd');
//Chức vụ
Route::get('position', 'PositionController@getlist');
Route::post('position/add', 'PositionController@postAdd');
Route::post('position/edit', 'PositionController@postEdit');
Route::post('position/delete', 'PositionController@postDelete');

//Chuyên Môn
Route::get('jobtype', 'JobTypeController@getlist');
Route::post('jobtype/add', 'JobTypeController@postAdd');
Route::post('jobtype/edit', 'JobTypeController@postEdit');
Route::post('jobtype/delete', 'JobTypeController@postDelete');

//Phòng Ban
Route::get('department', 'DepartmentController@getList');
Route::post('department/add', 'DepartmentController@postAdd');
Route::get('department/detail/{id}', 'DepartmentController@getDetail');
Route::get('department/detail/add-employee/{id}', 'DepartmentController@getAddEmployee');
Route::post('department/detail/add-employee/{id}', 'DepartmentController@postAddEmployee');
Route::post('department/edit/ajax', 'DepartmentController@postAjax');
Route::post('department/edit', 'DepartmentController@postEdit');
Route::get('department/edit/{id}', 'DepartmentController@getEdit');
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

Route::get('/home', 'HomeController@index');
