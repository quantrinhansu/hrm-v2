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

	//Business Trip
	Route::get('business-trip', 'BusinessTripController@getList');
	Route::get('business-trip/add', 'BusinessTripController@getAdd');
	Route::post('business-trip/add', 'BusinessTripController@postAdd');
	Route::post('business-trip/ajax', 'BusinessTripController@postAjax');
	Route::get('business-trip/edit/{id}', 'BusinessTripController@getEdit');
	Route::post('business-trip/edit/{id}', 'BusinessTripController@postEdit');
	Route::post('business-trip/delete', 'BusinessTripController@postDelete');

	//Khen thưởng / Kỷ luật
	Route::get('retribution', 'RetributionController@getList');
	Route::post('retribution/add', 'RetributionController@postAdd');
	Route::get('retribution/edit/{id}', 'RetributionController@getEdit');
	Route::post('retribution/edit', 'RetributionController@postEdit');
	Route::post('retribution/delete', 'RetributionController@postDelete');

	//Notification
	Route::get('notification', 'NotificationController@getList');
	Route::get('notification/add', 'NotificationController@getAdd');
	Route::post('notification/add', 'NotificationController@postAdd');
	Route::get('notification/edit/{id}', 'NotificationController@getEdit');
	Route::post('notification/edit/{id}', 'NotificationController@postEdit');
	Route::post('notification/delete', 'NotificationController@postDelete');
	Route::get('notification/detail/{id}', 'NotificationController@getDetail');

	//Leave
	Route::get('leave', 'LeaveController@getList');
	Route::get('leave/add', 'LeaveController@getAdd');
	Route::post('leave/add', 'LeaveController@postAdd');
	Route::post('leave/confirm', 'LeaveController@postConfirm');
	Route::post('leave/cancel', 'LeaveController@postCancel');

	//Manage Access
	Route::get('manage-access', 'ManageAccessController@getList');
	Route::post('manage-access/add', 'ManageAccessController@postAdd');

	Route::get('contract/add', 'ContractController@getAdd');
});
Route::get('/roles', 'RolesController@index');
Route::get('/roles/add', 'RolesController@create');
Route::get('/permission', 'PermissionController@index');

Route::get('/home', 'HomeController@index');
	
// Roles
Route::get('/roles', 'RolesController@index');
Route::get('/roles/add', 'RolesController@create');
Route::get('/permission', 'PermissionController@index');

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'UserController@autocomplete'));
