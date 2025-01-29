<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["prefix" => 'admin', 'as' => 'admin.'], function () {
    route::get("/", fn() => dd("Admin Dashboard"))->name("dashboard");

    // memebers routes
    Route::get('members/{id}/pdf', "PDF\PDFController@generateMemberPDF")->name('members.pdf.member-info');
    Route::resource('members', "MemberController");
    Route::post('members/get-role-salary', "MemberController@getRoleSalary")->name('members.get-role-salary')
    ->where('id', '[0-9]+');

    // role members routes
    Route::resource('role-members', "RMemberController");

    // committees routes
    Route::resource('committees','CommitteeController');
});
