<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as admin;
use App\Http\Controllers\CustomerController as customer;
use App\Http\Controllers\DeptController as dept;
use App\Http\Controllers\StatisticController as statistic;
Use App\Http\Controllers\HomeController As home;
Use App\Http\Controllers\InfoUserController As info;
Use App\Http\Controllers\TrinhDoController;
use App\Http\Controllers\WorkTimeController as wk;


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
//Route::get('/', function () {
//    return view('welcome');
//});

// ADMIN PAGE
Route::get('/admin', [admin::class, 'index']); // Login page
Route::get('/dashboard', [admin::class, 'show_dashboard']); // go to dashboard
Route::post('/admin-dashboard', [admin::class, 'dashboard']); // admin login process
Route::get('/logout', [admin::class, 'logout']); // logout admin page

Route::get('/all-customer', [customer::class, 'all_customer']); // get all customer show admin page
Route::get('/block-customer/{customer_id}', [customer::class, 'block_user']); // block customer account
Route::get('/active-customer/{customer_id}', [customer::class, 'active_user']); // activate customer account
Route::get('/edit-customer/{customer_id}', [customer::class, 'edit_customer']); // edit customer account
Route::post('/update-customer/{customer_id}', [customer::class, 'update_customer']); // update info customer account
Route::get('/search-customer', [customer::class, 'search_customer']); // search for customer in admin page

Route::get('/all-dept', [dept::class, 'all_dept']); // get all dept show admin page
Route::get('/add-dept', [dept::class, 'add_dept']);
Route::post('/save-dept', [dept::class, 'save_dept']);
Route::post('/update-dept/{DeptID}', [dept::class, 'update_dept']);
Route::get('/edit-dept/{DeptID}', [dept::class, 'edit_dept']);
Route::get('/delete-dept/{DeptID}', [dept::class, 'delete_dept']); // delete a dept
Route::get('/search-dept/{dept_name}', [dept::class, 'search_dept']);

Route::get('/statistic-filter/{top}', [statistic::class, 'statistic_filter']);
Route::get('/statistic', [statistic::class, 'statistic']);
//Route::get('/statistic/print-report', [statistic::class, 'print_report']);
//Route::get('/print-report', array('as'=>'StatisticPDF','user'=>'StatisticController@print_report'));
Route::get('/statistic/print-report', [statistic::class, 'print_report'])->name('generate-pdf');

// CLIENT PAGE
Route::get('/login', [home::class, 'login']);
Route::get('/register', [home::class, 'register']);
Route::post('/verify-login', [home::class, 'verify_login']);

Route::get('/', [home::class, 'index']);
Route::get('/home', [home::class, 'search_doctors']);


Route::get('/customer/{UserID}', [home::class, 'customer']);
Route::get('/doctor/{UserID}', [home::class, 'doctor']);

Route::get('/edituser', [info::class, 'index']);
Route::post('/update-info/{UserID}', [info::class, 'update_info']);

//Trinhdo
Route::get('/trinhdo', [TrinhDoController::class, 'index'])->name('trinhdo');
Route::post('/trinhdo/{UserID}', [TrinhDoController::class, 'store'])->name('trinhdo.store');

Route::get('/worktime', [wk::class, 'index']);
Route::get('/worktime/update/{WorkTimeID}',[wk::class,'edit_worktime' ]);
Route::post('/worktime/update/{UserID}',[wk::class,'update_worktime' ]);
