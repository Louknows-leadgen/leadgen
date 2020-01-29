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

/*
|------------------------------------------ 
|-- Root Route
|------------------------------------------
*/

Route::get('/','ApplicantsController@index')->name('root')->middleware('checkrole:2');



/*
|------------------------------------------ 
|-- Custom Routes
|------------------------------------------
*/

//- applicants
Route::get('/applicants/new/{id}','ApplicantsController@create')->name('applicants.create');
Route::get('/applicants/search','ApplicantsController@search')->name('applicants.search');

//- application routes
Route::get('/application/{applicant_id}/status/{status_id}','ApplicationsController@process')->name('applications.process')->middleware('checkrole:2');
Route::get('/application/{applicant_id}/procedure','ApplicationsController@procedure')->name('applications.procedure')->middleware('checkrole:2');
Route::get('/application/initial-screening/{applicant_id}','ApplicationsController@initial_screening')->name('applications.initial-screening')->middleware('checkrole:2');
Route::get('/application/final-interview/{applicant_id}','ApplicationsController@final_interview')->name('applications.final-interview')->middleware('checkrole:2');
Route::get('/application/job-orientation/{applicant_id}','ApplicationsController@job_orientation')->name('applications.job-orientation')->middleware('checkrole:2');

Route::get('/application/candidates','ApplicationsController@candidates')->name('applications.candidates')->middleware('checkrole:3');

Route::get('/application/candidates/search','ApplicationsController@search')->name('applications.search');

Route::get('/application/candidate/{applicant_id}/profile','ApplicationsController@profile')->name('applications.profile')->middleware('checkrole:3');


//- final interviews
Route::put('/final_interviews/{id}/update_result','FinalInterviewsController@update_result')->name('fin.update_result');
Route::get('/final_interview/{id}/form','FinalInterviewsController@form_partial')->name('fin.form');

//- persons
Route::get('/persons/{person_id}/list','PersonsController@list')->name('persons.list');
Route::get('/person/{item}/new','PersonsController@new')->name('person.new');
Route::get('/application/form','PersonsController@create')->name('person.form')->middleware('checkrole:1');
Route::view('/application/notification','applicant.notification')->name('person.notification');
Route::get('/application/validate','PersonsController@validate_field')->name('person.validate');

/*
|-------------------------
|     Resource details
|-------------------------
*/

// Index
Route::get('/resource-details/{person_id}','ResourceDetailsController@index')->name('rd.index');

// Person
Route::get('/resource-details/basic/{person_id}/edit','ResourceDetailsController@edit_person')->name('rd.edit_person');
Route::get('/resource-details/basic/{person_id}','ResourceDetailsController@show_person')->name('rd.show_person');
Route::put('/resource-details/basic/{person_id}','ResourceDetailsController@update_person')->name('rd.update_person');

// Spouse
Route::get('/resource-details/spouse/new','ResourceDetailsController@new_spouse')->name('rd.new_spouse');
Route::get('/resource-details/spouse/{person_id}','ResourceDetailsController@show_spouses')->name('rd.show_spouses');
Route::get('/resource-details/spouse/{spouse_id}/edit','ResourceDetailsController@edit_spouse')->name('rd.edit_spouse');
Route::get('/resource-details/spouse/{spouse_id}/show','ResourceDetailsController@show_spouse')->name('rd.show_spouse');
Route::put('/resource-details/spouse/{spouse_id}','ResourceDetailsController@update_spouse')->name('rd.update_spouse');
Route::post('/resource-details/spouse','ResourceDetailsController@store_spouse')->name('rd.store_spouse');
Route::delete('/resource-details/spouse/{spouse_id}','ResourceDetailsController@destroy_spouse')->name('rd.destroy_spouse');

// Emergency Contact
Route::get('/resource-details/contact/new','ResourceDetailsController@new_contact')->name('rd.new_contact');
Route::get('/resource-details/contact/{person_id}','ResourceDetailsController@show_contacts')->name('rd.show_contacts');
Route::get('/resource-details/contact/{contact_id}/edit','ResourceDetailsController@edit_contact')->name('rd.edit_contact');
Route::get('/resource-details/contact/{contact_id}/show','ResourceDetailsController@show_contact')->name('rd.show_contact');
Route::put('/resource-details/contact/{contact_id}','ResourceDetailsController@update_contact')->name('rd.update_contact');
Route::post('/resource-details/contact','ResourceDetailsController@store_contact')->name('rd.store_contact');
Route::delete('/resource-details/contact/{contact_id}','ResourceDetailsController@destroy_contact')->name('rd.destroy_contact');

// Dependent
Route::get('/resource-details/dependent/new','ResourceDetailsController@new_dependent')->name('rd.new_dependent');
Route::get('/resource-details/dependent/{person_id}','ResourceDetailsController@show_dependents')->name('rd.show_dependents');
Route::get('/resource-details/dependent/{dependent_id}/edit','ResourceDetailsController@edit_dependent')->name('rd.edit_dependent');
Route::put('/resource-details/dependent/{dependent_id}','ResourceDetailsController@update_dependent')->name('rd.update_dependent');
Route::get('/resource-details/dependent/{dependent_id}/show','ResourceDetailsController@show_dependent')->name('rd.show_dependent');
Route::post('/resource-details/dependent','ResourceDetailsController@store_dependent')->name('rd.store_dependent');
Route::delete('/resource-details/dependent/{dependent_id}','ResourceDetailsController@destroy_dependent')->name('rd.destroy_dependent');

// Education
Route::get('/resource-details/education/{person_id}','ResourceDetailsController@show_educations')->name('rd.show_educations');
Route::get('/resource-details/elementary/{elem_id}/edit','ResourceDetailsController@edit_elementary')->name('rd.edit_elementary');
Route::put('/resource-details/elementary/{elem_id}','ResourceDetailsController@update_elementary')->name('rd.update_elementary');
Route::get('/resource-details/elementary/{elem_id}/show','ResourceDetailsController@show_elementary')->name('rd.show_elementary');
Route::get('/resource-details/high/{high_id}/edit','ResourceDetailsController@edit_high')->name('rd.edit_high');
Route::put('/resource-details/high/{high_id}','ResourceDetailsController@update_high')->name('rd.update_high');
Route::get('/resource-details/high/{high_id}/show','ResourceDetailsController@show_high')->name('rd.show_high');
Route::get('/resource-details/college/new','ResourceDetailsController@new_college')->name('rd.new_college');
Route::get('/resource-details/college/{college_id}/edit','ResourceDetailsController@edit_college')->name('rd.edit_college');
Route::get('/resource-details/college/{college_id}/show','ResourceDetailsController@show_college')->name('rd.show_college');
Route::put('/resource-details/college/{college_id}','ResourceDetailsController@update_college')->name('rd.update_college');
Route::post('/resource-details/college','ResourceDetailsController@store_college')->name('rd.store_college');
Route::delete('/resource-details/college/{college_id}','ResourceDetailsController@destroy_college')->name('rd.destroy_college');

// Work Experience
Route::get('/resource-details/work/new','ResourceDetailsController@new_work')->name('rd.new_work');
Route::get('/resource-details/work/{person_id}','ResourceDetailsController@show_works')->name('rd.show_works');
Route::get('/resource-details/work/{work_id}/edit','ResourceDetailsController@edit_work')->name('rd.edit_work');
Route::get('/resource-details/work/{work_id}/show','ResourceDetailsController@show_work')->name('rd.show_work');
Route::put('/resource-details/work/{work_id}','ResourceDetailsController@update_work')->name('rd.update_work');
Route::post('/resource-details/work','ResourceDetailsController@store_work')->name('rd.store_work');
Route::delete('/resource-details/work/{work_id}','ResourceDetailsController@destroy_work')->name('rd.destroy_work');


/*
|------------------------------------------ 
|-- Resource Routes
|------------------------------------------
*/

Route::resource('applicants','ApplicantsController')->except(['create']);
Route::resource('applicants','ApplicantsController')->only(['show'])->middleware('checkrole:2');
Route::resource('persons','PersonsController')->except(['create']);
Route::resource('initial_screenings','InitialScreeningsController')->only(['store']);
Route::resource('final_interviews','FinalInterviewsController')->only(['store','edit','update']);
Route::resource('job_orientations','JobOrientationsController')->only(['store','edit','update']);

/*
|------------------------------------------ 
|-- Authentication Routes
|------------------------------------------
*/
Auth::routes();


Route::get("/phpinfo",function(){
	phpinfo();
});