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

Route::get('home', function(){
	return view('layouts.app');
});

Route::get('profile', function(){
	return view('profile');
});

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

Route::get('listdepartment', function(){
	return view('department.list');
});

Route::get('chucdanh', function(){
	return view('ChucDanh.list');
});

Route::get('chucvu', function(){
	return view('ChucVu.list');
});

Route::get('chuyenmon', function(){
	return view('ChuyenMon.list');
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