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

//- colleges
Route::get('/colleges/more/{person_id}','CollegesController@more')->name('colleges.more');

//- dependents
Route::get('/dependents/{person_id}/list','DependentsController@list')->name('dependents.list');
Route::get('/dependents/more/{person_id}','DependentsController@more')->name('dependents.more');

//- educations
Route::get('/educations/{person_id}/list','EducationsController@list')->name('educations.list');

//- emergency contacts
Route::get('/emergency_contacts/{person_id}/list','EmergencyContactsController@list')->name('contacts.list');
Route::get('/emergency_contacts/more/{person_id}','EmergencyContactsController@more')->name('contacts.more');

//- final interviews
Route::put('/final_interviews/{id}/update_result','FinalInterviewsController@update_result')->name('fin.update_result');
Route::get('/final_interview/{id}/form','FinalInterviewsController@form_partial')->name('fin.form');

//- persons
Route::get('/persons/{person_id}/list','PersonsController@list')->name('persons.list');
Route::get('/person/{item}/new','PersonsController@new')->name('person.new');
Route::get('/application/form','PersonsController@create')->name('person.form')->middleware('checkrole:1');
Route::view('/application/notification','applicant.notification')->name('person.notification');
Route::get('/application/validate','PersonsController@validate_field')->name('person.validate');


//- spouses
Route::get('/spouses/{person_id}/list','SpousesController@list')->name('spouses.list');
Route::get('/spouses/more/{person_id}','SpousesController@more')->name('spouses.more');

//- work experiences
Route::get('/work_experiences/{person_id}/list','WorkExperiencesController@list')->name('work_experiences.list');
Route::get('/work_experiences/more/{person_id}','WorkExperiencesController@more')->name('work_experiences.more');

/*
|------------------------------------------ 
|-- Resource Routes
|------------------------------------------
*/

Route::resource('applicants','ApplicantsController')->except(['create']);
Route::resource('applicants','ApplicantsController')->only(['show'])->middleware('checkrole:2');
Route::resource('spouses','SpousesController');
Route::resource('emergency_contacts','EmergencyContactsController');
Route::resource('dependents','DependentsController');
Route::resource('colleges','CollegesController');
Route::resource('work_experiences','WorkExperiencesController');
Route::resource('persons','PersonsController')->except(['create']);
Route::resource('educations','EducationsController')->only(['show','edit','update']);
Route::resource('initial_screenings','InitialScreeningsController')->only(['store']);
Route::resource('final_interviews','FinalInterviewsController')->only(['store','edit','update']);
Route::resource('job_orientations','JobOrientationsController')->only(['store','edit','update']);


/*
|------------------------------------------ 
|-- Authentication Routes
|------------------------------------------
*/

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get("/phpinfo",function(){
	phpinfo();
});