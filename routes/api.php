<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('cors')->group(function () {
        
                ///////////////////// admin
        Route::prefix('admin')->namespace('DashBoard')->group(function(){
                        /////////////////// profile ///////////////////
                Route::post('/login', 'ConfingrationController@login');
                Route::get('/profile', 'ConfingrationController@showProfile');
                Route::put('/update-profile', 'ConfingrationController@updateProfile');
                        ////////////////// configration ///////////////////
                Route::get('/configration', 'ConfingrationController@getConfigration'); 
                Route::put('/update-configration', 'ConfingrationController@UpdateConfigration');   
                Route::post('upload-file', 'ConfingrationController@uploadFile'); 
                        //////////////////////////////////////////////////
                Route::middleware('checkLogin')->group(function () {
                        Route::post('/logout', 'ConfingrationController@logout')->name('admin.logout');
                });
                Route::resource('admins' , "AdminController");
                Route::resource('teams' , "TeamController");
                Route::resource('courses' , "CourseController");
                Route::resource('articles' , "ArticleController");
                Route::resource('departments' , "DepartmentController");
                Route::resource('events' , "EventController");
                Route::resource('complaints' , "ComplaintController");
               
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


