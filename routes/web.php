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
Route::get('/','PagesController@home')->name('home');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('login.teacher');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm')->name('login.student');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/teacher', 'Auth\RegisterController@showTeacherRegisterForm')->name('register.teacher');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm')->name('register.student');

Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('login.admin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin')->name('login.teacher');
Route::post('/login/student', 'Auth\LoginController@studentLogin')->name('login.student');

Route::post('/register/admin', 'Auth\RegisterController@createadmin')->name('register.admin');
Route::post('/register/teacher', 'Auth\RegisterController@createteacher')->name('register.teacher');
Route::post('/register/student', 'Auth\RegisterController@createstudent')->name('register.student');

Route::view('/home', 'pages/home')->name('home');
Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin');
Route::view('/teacher', 'teacher')->middleware('auth:teacher')->name('teacher');

Route::get('/comment','PagesController@addcomment')->middleware('auth:teacher')->name('comment');
Route::post('/comment','PagesController@storecomment')->name('comment');

Route::get('/schedule/admin','PagesController@viewSchedule')->middleware('auth:admin')->name('schedule.admin');
Route::post('/schedule/admin','PagesController@createSchedule')->middleware('auth:admin');
Route::get('/schedule/teacher','PagesController@teacherschedule')->middleware('auth:teacher')->name('schedule.teacher');
Route::get('/schedule/student','PagesController@studentschedule')->middleware('auth:student')->name('schedule.student');
Route::get('/salary','PagesController@viewsalary')->middleware('auth:teacher')->name('salary');
Route::post('/sendemail', 'PagesController@mail')->middleware('auth:admin')->name('sendemail');
Route::get('/viewemail','PagesController@viewmail')->middleware('auth:admin')->name('viewemail');

Route::get('/makeworksheet','PagesController@viewmakeworksheet')->middleware('auth:teacher')->name('makeworksheet');
Route::post('/makeworksheet','PagesController@makeworksheet')->middleware('auth:teacher')->name('makeworksheet');
Route::get('/viewworksheet','PagesController@viewworksheet')->middleware('auth:student')->name('viewworksheet');
Route::get('/viewcomments','PagesController@viewcomments')->middleware('auth:student')->name('viewcomment');
Route::view('/student', 'student')->middleware('auth:student')->name('student');
Auth::routes();
// Route::post('/logout', function() {
//     return view('logout');
// })->name('logout');

//Route::post('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');