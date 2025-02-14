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
    Route::view('/',view: 'back.dashboard')->name("dashboard");


    // members routes (pdf)
    Route::get('members/{id}/pdf', 'PDF\MemberPDFController@generateMemberPDF')
        ->name('members.pdf.member-info');

    Route::get("members/decisions/pdf/{type?}", action: "PDF\MemberPDFController@generateDecisions")
        ->name("members.pdf.generate-decisions");

    Route::get("members/pdf/export", action: "PDF\MemberPDFController@exportMembers")
        ->name("members.pdf.export-members");

    Route::get("pdf/members/cin-cards", action: "PDF\MemberPDFController@exportCinCards")
        ->name(name: "members.pdf.export-cin-cards");


    Route::get("pdf/members/cin-card/{member}", action: "PDF\MemberPDFController@exportCinCard")
        ->name("members.pdf.export-cin-card");

    // members routes
    Route::resource('members', "MemberController");

    Route::get("members/{id}/status/{status}", "MemberController@changeStatus")
        ->name('members.change-status');

    Route::post('members/get-role-salary', "MemberController@getRoleSalary")
        ->name('members.get-role-salary')
        ->where('id', '[0-9]+');

    // role members routes
    Route::resource('role-members', "RMemberController");

    // committees routes
    Route::resource('committees', 'CommitteeController');
});
