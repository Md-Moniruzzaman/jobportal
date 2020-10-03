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
//Jobs Profile
Route::get('/', 'JobController@index');
Route::get('Job/create', 'JobController@create')->name('Job.create');
Route::post('Job/store', 'JobController@store')->name('Job.store');
Route::get('Job/myjobs', 'JobController@myjobs')->name('Job.myjobs');
Route::get('Job/{id}/edit', 'JobController@edit')->name('Job.edit');
Route::post('Job/{id}/update', 'JobController@update')->name('Job.update');
Route::get('Job/{id}/delete', 'JobController@delete')->name('Job.delete');
Route::post('Job/apply/{id}', 'JobController@apply')->name('Job.apply');
Route::get('Job/applicants', 'JobController@applicants')->name('Job.applicants');
Route::get('Job/alljobs', 'JobController@alljobs')->name('alljobs');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Job/{id}/{job}', 'JobController@show')->name('Job.show');

//Company Profile
Route::get('/Company/{id}/{company}', 'CompanyController@index')->name('Company.index');
Route::get('/Company/create', 'CompanyController@create')->name('Company.create');
Route::post('/Company/store', 'CompanyController@store')->name('Company.store');
Route::post('/Company/coverPhoto', 'CompanyController@coverPhoto')->name('Company.coverPhoto');
Route::post('/Company/logo', 'CompanyController@logo')->name('Company.logo');
Route::get('/Company', 'CompanyController@company')->name('company');

//User Profile
Route::get('/User/profile', 'ProfileController@index')->name('Profile.index');
Route::post('/User/profile/create', 'ProfileController@store')->name('Profile.store');
Route::post('/profile/coverletter', 'ProfileController@coverletter')->name('Profile.coverletter');
Route::post('/profile/resume', 'ProfileController@resume')->name('Profile.resume');
Route::post('/profile/avatar', 'ProfileController@avatar')->name('Profile.avatar');

//Employer profile
Route::view('employment/register', 'auth.emp_register')->name('employee.reg');
Route::post('employment/register', 'EmployerProfileController@employerProfile')->name('Employer.register');

//About section
Route::get('about','AboutController@about');

//Categories section
Route::get('category','CategoryController@categoryCreate')->name('Category.categoryCreate');
Route::get('category/{id}','CategoryController@index')->name('Category.index');
Route::get('categories/{type}','CategoryController@type')->name('Categories.type');

//Contacts
Route::get('contacts','ContactController@contacts');

//Blogs
Route::get('/Blog', 'BlogController@index')->name('index');
