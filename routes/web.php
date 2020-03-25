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

Route::get('/','ApplicantsController@index')->name('root');


/*
|------------------------------------------ 
|-- Custom Routes
|------------------------------------------
*/

//- applicants
Route::get('/applicants/new/{id}','ApplicantsController@create')->name('applicants.create');
Route::get('/applicants/search','ApplicantsController@search')->name('applicants.search');
Route::put('/applicants/{id}/decline_offer','ApplicantsController@decline_offer')->name('applicants.decline_offer');

//- application routes
Route::get('/application/{applicant_id}/procedure','ApplicationsController@procedure')->name('applications.procedure');

Route::get('/application/candidates','ApplicationsController@candidates')->name('applications.candidates');

Route::get('/application/candidates/search','ApplicationsController@search')->name('applications.search');

Route::get('/application/candidate/{applicant_id}/profile','ApplicationsController@profile')->name('applications.profile');

//- blacklist hit
Route::get('/blacklist/{applicant_id}','BlacklistsController@hit')->name('blacklists.hit');
Route::get('/blacklist/applicant/{id}','BlacklistsController@blacklist_applicant')->name('blacklists.blacklist_applicant');
Route::get('/blacklists/employee/{id}','BlacklistsController@blacklist_employee')->name('blacklists.blacklist_employee');
Route::post('/blacklist/applicant/store','BlacklistsController@blacklist_applicant_store')->name('blacklists.applicant_store');
Route::post('/blacklists/employee/store','BlacklistsController@blacklist_employee_store')->name('blacklists.employee_store');

//- employees
Route::get('/employees/{applicant_id}/create','EmployeesController@create')->name('employees.create');
Route::get('/employees/active','EmployeesController@active')->name('employees.active');
Route::get('/employees/inactive','EmployeesController@inactive')->name('employees.inactive');
Route::get('/employees/search','EmployeesController@search')->name('employees.search');
Route::put('/employees/update_hmo/{employee_id}','EmployeesController@update_hmo')->name('employees.update_hmo');

//- exit clearance

Route::post('/exit-clearances/store','ExitClearancesController@store')->name('ext-clr.store');

Route::get('/exit-clearances/{id}/create','ExitClearancesController@create')->name('ext-clr.create');

Route::get('/exit-clearances','ExitClearancesController@index')->name('ext-clr.index');

//- final interviews
Route::put('/final_interviews/{id}/update_result','FinalInterviewsController@update_result')->name('fin.update_result');
Route::get('/final_interview/{id}/form','FinalInterviewsController@form')->name('fin.form');
Route::put('/final_interviews/{id}/no_show','ApplicationsController@no_show')->name('fin.no_show');

//- hmo
Route::post('/hmo/{id}/store','HealthInsurancesController@store')->name('hmo.store');
Route::delete('/hmo/{id}/destroy','HealthInsurancesController@destroy')->name('hmo.destroy');

//- hr manager
Route::get('hr-managers/dashboard','HrManagerDashboardsController@index')->name('hr-managers.index');

//- interview history
Route::get('/interviews/history/search','InterviewHistoriesController@search')->name('history.search');

//- job
Route::get('/api/jobs/{job_id}','JobsController@api_department'); // api

//- job offer
Route::get('/job-offerings/search','JobOfferingsController@search')->name('job-offerings.search');

//- job orientation
Route::get('/job_orientation/{id}/form','JobOrientationsController@form')->name('jo.form');

//- persons
Route::get('/person/{item}/new','PersonsController@new')->name('person.new');
Route::get('/application/form','PersonsController@create')->name('person.form');
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
Route::get('/resource-details/spouse/{spouse_id}/edit','ResourceDetailsController@edit_spouse')->name('rd.edit_spouse');
Route::get('/resource-details/spouse/{spouse_id}/show','ResourceDetailsController@show_spouse')->name('rd.show_spouse');
Route::put('/resource-details/spouse/{spouse_id}','ResourceDetailsController@update_spouse')->name('rd.update_spouse');
Route::post('/resource-details/spouse','ResourceDetailsController@store_spouse')->name('rd.store_spouse');
Route::delete('/resource-details/spouse/{spouse_id}','ResourceDetailsController@destroy_spouse')->name('rd.destroy_spouse');

// Emergency Contact
Route::get('/resource-details/contact/new','ResourceDetailsController@new_contact')->name('rd.new_contact');
Route::get('/resource-details/contact/{contact_id}/edit','ResourceDetailsController@edit_contact')->name('rd.edit_contact');
Route::get('/resource-details/contact/{contact_id}/show','ResourceDetailsController@show_contact')->name('rd.show_contact');
Route::put('/resource-details/contact/{contact_id}','ResourceDetailsController@update_contact')->name('rd.update_contact');
Route::post('/resource-details/contact','ResourceDetailsController@store_contact')->name('rd.store_contact');
Route::delete('/resource-details/contact/{contact_id}','ResourceDetailsController@destroy_contact')->name('rd.destroy_contact');

// Dependent
Route::get('/resource-details/dependent/new','ResourceDetailsController@new_dependent')->name('rd.new_dependent');
Route::get('/resource-details/dependent/{dependent_id}/edit','ResourceDetailsController@edit_dependent')->name('rd.edit_dependent');
Route::put('/resource-details/dependent/{dependent_id}','ResourceDetailsController@update_dependent')->name('rd.update_dependent');
Route::get('/resource-details/dependent/{dependent_id}/show','ResourceDetailsController@show_dependent')->name('rd.show_dependent');
Route::post('/resource-details/dependent','ResourceDetailsController@store_dependent')->name('rd.store_dependent');
Route::delete('/resource-details/dependent/{dependent_id}','ResourceDetailsController@destroy_dependent')->name('rd.destroy_dependent');

// Education
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
Route::resource('persons','PersonsController')->only(['store']);
Route::resource('initial_screenings','InitialScreeningsController')->only(['store']);
Route::resource('final_interviews','FinalInterviewsController')->only(['store','edit','update']);
Route::resource('job_orientations','JobOrientationsController')->only(['store','edit','update']);
Route::resource('interviews/history','InterviewHistoriesController')->only(['index','show','destroy']);
Route::resource('job-offerings','JobOfferingsController')->only(['index']);
Route::resource('hiring-staff/notifications','PusherNotificationsController')->only(['index','destroy']);
Route::resource('blacklists','BlacklistsController')->only(['index','store']);
Route::resource('employees','EmployeesController')->except(['create']);
Route::resource('clusters','ClustersController');
Route::resource('contracts','ContractsController');
Route::resource('government_details','GovernmentDetailsController');
Route::resource('compensations','CompensationsController');

/*
|------------------------------------------ 
|-- Authentication Routes
|------------------------------------------
*/
Auth::routes();

Route::get('/account','UsersController@index')->name('user.account');
Route::put('/account/update-email','UsersController@update_email')->name('user.update-email');
Route::get('/account/edit-password','UsersController@edit_password')->name('user.edit-password');
Route::put('/account/update-password','UsersController@update_password')->name('user.update-password');




