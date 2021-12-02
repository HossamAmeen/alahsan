<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('cors')->group(function () {
                ///////////////////// admin
        Route::prefix('admin')->namespace('DashBoard')->group(function(){
                Route::post('/login', 'APIAuthController@login')->name('admin.login');
                Route::middleware('checkLogin')->group(function () {
                        Route::post('/logout', 'APIAuthController@logout')->name('admin.logout');
                });
                Route::resource('admins' , "AdminController");
                Route::resource('teams' , "TeamController");
                Route::resource('courses' , "CourseController");
                Route::resource('articles' , "ArticleController");
                Route::resource('departments' , "DepartmentController");
                Route::resource('events' , "EventController");
               
        });
                ////////////////////////////// website //////////////////////////////
                Route::post('complaint', 'HomeController@complaint');
                Route::get('teamwork', 'HomeController@teamwork');
                Route::get('articles/{id?}', 'HomeController@articles');
                Route::get('courses', 'HomeController@courses');
                Route::get('departments', 'HomeController@departments');
                Route::get('events', 'HomeController@events');
                Route::get('home', 'HomeController@home');
});

