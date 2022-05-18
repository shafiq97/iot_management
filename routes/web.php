<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\EventController;

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

Route::get('user', [UserController::class, 'index']);

///// Admin routes //////

Route::get('admin/dashboard', [AdminController::class, 'index']);

// Route::get('admin/add_device', function () {
//     return view('admin.add_device');
// });

Route::get('admin/add_device', [DevicesController::class, 'addView']);


Route::get('admin/add_event', function () {
    return view('admin.add_event');
});
// Route::get('admin/user', function () {
//     return view('admin.user');
// });
// Route::get('admin/user/{id}', 'AdminController@updateApprovalView')->name('updateUserApproval.user');
Route::get('admin/user/{id}', [AdminController::class, 'updateApprovalView'])->name('updateUserApprovalView.user');
Route::post('admin/user', [AdminController::class, 'updateApproval'])->name('updateUserApproval.user');
Route::get('admin/user', [AdminController::class, 'getUsers']);
Route::post('admin/updateuserinfo', [AdminController::class, 'updateuserinfo']);
Route::post('updateuserinfo', [UserController::class, 'updateuserinfo']);
Route::post('admin/add', [DevicesController::class, 'add']);
Route::post('admin/edit_device', [DevicesController::class, 'edit_device']);
Route::post('admin/edit_event', [EventController::class, 'edit_event']);
Route::get('admin/view_device/{id}', [DevicesController::class, 'edit_devices'])->name('updateDevice.admin');
Route::get('admin/view_event/{id}', [EventController::class, 'edit_events'])->name('updateEvent.admin');
Route::get('admin/view_devices', [DevicesController::class, 'view_devices']);
Route::get('admin/view_events', [EventController::class, 'view_events']);
Route::get('view_devices', [UserController::class, 'view_devices']);
Route::post('admin/add_event', [EventController::class, 'add_event']);
Route::post('admin/device_search', [EventController::class, 'autocompleteSearch']);
Route::get('admin/profile', [AdminController::class, 'viewProfile']);
Route::get('admin/device_type', [DevicesController::class, 'viewDeviceType']);
Route::get('admin/add_device_type', [DevicesController::class, 'addDeviceTypeView']);
Route::post('admin/add_device_type_action', [DevicesController::class, 'addDeviceTypeAction']);
Route::get('admin/delete_device_type/{id}', [DevicesController::class, 'deleteDeviceType']);
Route::get('admin/delete_device_unit/{id}', [DevicesController::class, 'deleteDeviceUnit']);
Route::get('admin/device_unit', [DevicesController::class, 'addDeviceUnit']);
Route::get('admin/device_units', [DevicesController::class, 'ViewDeviceUnit']);
Route::post('admin/device_unit', [DevicesController::class, 'addDeviceUnitAction']);
Route::get('profile', [UserController::class, 'viewProfile']);



// Temp
Route::get('admin/temp', [AdminController::class, 'temp']);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello', function(){
//     return "hello world";
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
