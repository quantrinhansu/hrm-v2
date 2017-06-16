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
	Route::get('profile/{id}', 'UserController@show');
	Route::post('profile/{id}', 'UserController@postEditProfile');
	Route::post('profile/change-password/{id}', 'UserController@postChangePassword');
	Route::post('profile/change-avatar/{id}', 'UserController@postChangeAvatar');

   //Ch?c v?
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
	Route::post('employee/add/getUsername', 'UserController@postGetUsername');
	Route::get('employee/edit/{id}', 'UserController@getEdit');
	Route::post('employee/edit/{id}', 'UserController@postEdit');
	Route::post('employee/delete', 'UserController@postDelete');
	Route::get('employee/export', 'UserController@getExport');
	Route::get('employee/export/pdf', 'UserController@getExportPdf');
	Route::get('employee/import', 'UserController@getImport');
	Route::post('employee/import', 'UserController@postImport');

	Route::get('/permission', 'PermissionController@index');
	Route::post('/permission/create', 'PermissionController@create');
	Route::post('/permission/update', 'PermissionController@update');
	Route::post('/permission/delete', 'PermissionController@delete');

	// Roles
	Route::get('/roles', 'RolesController@index');
	Route::post('/roles/create', 'RolesController@create');
	Route::post('/roles/edit','RolesController@update');
	Route::post('/roles/delete', 'RolesController@delete');


	Route::get('/roles/viewedit/{id}', 'RolesController@view_edit');
	Route::get('/roles/viewadd','RolesController@view_add');

	Route::get('/roles/users', 'RolesController@users');
	Route::post('/roles/users_role_update', 'RolesController@users_role_update');


	//Timekeeping
	Route::get('/timekeeping', 'TimekeepingController@index');
	Route::post('/timekeeping/store', 'TimekeepingController@store');
	//Route::get('/timekeeping', 'SalaryController@timekeeping');
	Route::get('/salary', 'SalaryController@index');
	Route::get('/allowance', 'SalaryController@allowance');
	Route::post('/allowance/add', 'SalaryController@allowance_add');


	//Business Trip
	Route::get('business-trip', 'BusinessTripController@getList');
	Route::get('business-trip/add', 'BusinessTripController@getAdd');
	Route::post('business-trip/add', 'BusinessTripController@postAdd');
	Route::post('business-trip/ajax', 'BusinessTripController@postAjax');
	Route::get('business-trip/edit/{id}', 'BusinessTripController@getEdit');
	Route::post('business-trip/edit/{id}', 'BusinessTripController@postEdit');
	Route::post('business-trip/delete', 'BusinessTripController@postDelete');

	//Khen thu?ng / K? lu?t
	Route::get('retribution', 'RetributionController@getList');
	Route::post('retribution/add', 'RetributionController@postAdd');
	Route::get('retribution/edit/{id}', 'RetributionController@getEdit');
	Route::post('retribution/edit', 'RetributionController@postEdit');
	Route::post('retribution/delete', 'RetributionController@postDelete');
	Route::get('retribution/export', 'RetributionController@getExport');

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
	Route::post('manage-access/update', 'ManageAccessController@postUpdate');


	//Contract
	Route::get('contract', 'ContractController@getList');
	Route::get('contract/add/{id}', 'ContractController@getAdd');
	Route::post('contract/add/{id}', 'ContractController@postAdd');
	Route::get('contract/edit/{id}', 'ContractController@getEdit');
	Route::post('contract/edit/{id}', 'ContractController@postEdit');
	Route::post('contract/delete', 'ContractController@postDelete');
	Route::get('contract/export/{id}', 'ContractController@getExport');
		
	Route::get('help', 'HelpController@getIntroduce');
	Route::get('help/edit', 'HelpController@getEdit');
	Route::post('help/edit', 'HelpController@postEdit');
	Route::get('help/feedback', 'HelpController@getFeedBack');
	Route::post('help/feedback', 'HelpController@postFeedBack');
});


Auth::routes();
Route::get('login', 'LoginController@getLogin');
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@postLogin']);
Route::post('logout', [ 'as' => 'logout', 'uses' => 'LoginController@postLogout']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/edit', 'HomeController@getEdit');
Route::post('home/edit', 'HomeController@postEdit');
Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'UserController@autocomplete'));
Route::get('autocomplete-department', array('as' => 'autocomplete-department', 'uses' => 'UserController@autocomplete_department'));
