<?php

use Illuminate\Support\Facades\Route;

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


//Route::get('/','HompePageController@index');

Route::controller(HomePageController::class)->group(function (){
    Route::get('/','index')->name('front.homepage');
});


Route::controller(CourseController::class)->group(function (){
    Route::get('categories/{id}','getCourseByCategoryId')->name('front.getCourseByCategoryId');
    Route::get('categories/{cat_id}/courses/{id}','getCourseById')->name('front.getCourseById');

});

Route::controller(ContactController::class)->group(function (){
    Route::get('contact','index')->name('front.contact');
});

Route::controller(NewsletterController::class)->group(function (){
    Route::post('store-newsletter','storeNewsletter')->name('front.storeNewsletter');
});


Route::controller(MessageController::class)->group(function (){
    Route::post('store-message','storeMessage')->name('front.storeMessage');
});


Route::controller(StudentController::class)->group(function (){
    Route::post('register-student','storeStudent')->name('front.storeStudent');
});
