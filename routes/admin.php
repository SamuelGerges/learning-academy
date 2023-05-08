<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function (){


    Route::controller(AuthController::class)->group(function (){
        Route::get('login','viewLogin')->name('auth.viewLogin');
        Route::post('login','login')->name('auth.login');
        Route::get('logout','logout')->name('auth.logout')->middleware('auth:admin');
    });
    Route::middleware('auth:admin')->group(function (){
        Route::controller(HomeController::class)->group(function (){
            Route::get('/','index')->name('home');
        });

        Route::controller(CategoryController::class)->prefix('category')->group(function (){
            Route::get('/','index')->name('showCategory');
            Route::get('create','create')->name('createCategory');
            Route::post('store','store')->name('storeCategory');
            Route::get('edit/{id}','edit')->name('editCategory');
            Route::post('update/{id}','update')->name('updateCategory');
            Route::get('delete/{id}','delete')->name('deleteCategory');
        });

        Route::controller(TrainerController::class)->prefix('trainer')->group(function (){
            Route::get('/','index')->name('showTrainer');
            Route::get('create','create')->name('createTrainer');
            Route::post('store','store')->name('storeTrainer');
            Route::get('edit/{id}','edit')->name('editTrainer');
            Route::post('update/{id}','update')->name('updateTrainer');
            Route::get('delete/{id}','delete')->name('deleteTrainer');
        });



        Route::controller(CourseController::class)->prefix('course')->group(function (){
            Route::get('/','index')->name('showCourse');
            Route::get('create','create')->name('createCourse');
            Route::post('store','store')->name('storeCourse');
            Route::get('edit/{id}','edit')->name('editCourse');
            Route::post('update/{id}','update')->name('updateCourse');
            Route::get('delete/{id}','delete')->name('deleteCourse');
        });


        Route::controller(StudentController::class)->prefix('student')->group(function (){
            Route::get('/','index')->name('showStudent');
            Route::get('create','create')->name('createStudent');
            Route::post('store','store')->name('storeStudent');
            Route::get('edit/{id}','edit')->name('editStudent');
            Route::post('update/{id}','update')->name('updateStudent');
            Route::get('delete/{id}','delete')->name('deleteStudent');
            Route::get('{student_id}/show-courses','showCourses')->name('students.showCourses');
            Route::get('{student_id}/approve-course/{course_id}','approveCourse')->name('students.approveCourse');
            Route::get('{student_id}/reject-course/{course_id}','rejectCourse')->name('students.rejectCourse');


            Route::get('{student_id}/add-to-course','addNewCourseForStudent')->name('students.addNewCourseForStudent');
            Route::post('{student_id}/store-to-course','storeNewCourseForStudent')->name('students.storeNewCourseForStudent');
        });

    });


});
