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

//All Student Info View
Route::resource('pcstudentview', 'PcallstudentController');

Route::post('pcstudentview/update', 'PcallstudentController@update')->name('pcstudentview.update');

Route::get('pcstudentview/destroy/{id}', 'PcallstudentController@destroy');
///

//All Student Info View
Route::resource('internalrvw', 'AllintrnlstudentController');

Route::post('internalrvw/update', 'AllintrnlstudentController@update')->name('internalrvw.update');

Route::get('internalrvw/destroy/{id}', 'AllintrnlstudentController@destroy');
///

//Show Student Details
// Route::get('/allproject', 'AllstudentController@index'); 

Route::get('/updatedoc/{id}/editdoc', 'DocurlController@edit');
Route::patch('/updatedoc/{id}','DocurlController@update');

// Route::get('/uploadvideo/{id}/edit', 'VideourlController@edit');
// Route::patch('/uploadvideo/{id}','VideourlController@update');

Route::get('/updatefinal/{id}/editfinal', 'FinalurlController@edit');
Route::patch('/updatefinal/{id}','FinalurlController@update');

//All Student Info View
Route::resource('allproject', 'AllstudentController');

Route::post('allproject/update', 'AllstudentController@update')->name('allproject.update');

Route::get('allproject/destroy/{id}', 'AllstudentController@destroy');
///

////Upload Video
Route::resource('uploadvideo', 'VideourlController');

// Route::post('uploadvideo/update', 'VideourlController@update')->name('uploadvideo.update');

Route::get('uploadvideo/destroy/{id}', 'VideourlController@destroy');

Route::get('/viewvideo', 'VideourlController@viewvideolist');
///

////Update semester Information
Route::resource('updatesemester', 'SemesterController');
Route::post('updatesemester/update', 'SemesterController@update')->name('updatesemester.update');
Route::get('updatesemester/destroy/{id}', 'SemesterController@destroy');

Route::get('/linkdisable', 'SemesterController@semesterlink');

Route::post('/panel/link/open', 'SemesterController@openlink');

Route::post('/panel/link/off', 'SemesterController@offlink');

///


////Semester wise notice
Route::resource('semesternotice', 'NoticeController');

Route::post('semesternotice/update', 'NoticeController@update')->name('semesternotice.update');

Route::get('semesternotice/destroy/{id}', 'NoticeController@destroy');
///

////Eligibility notice
Route::resource('eligibility', 'EligibilityController');

Route::post('eligibility/update', 'EligibilityController@update')->name('eligibility.update');

Route::get('eligibility/destroy/{id}', 'EligibilityController@destroy');
///

//// Marks info
Route::resource('showmarks', 'MarksController');

Route::post('showmarks/update', 'MarksController@update')->name('showmarks.update');

Route::get('showmarks/destroy/{id}', 'MarksController@destroy');
///

////Internal Mark
Route::resource('intmarks', 'InternalmarkController');

Route::post('intmarks/update', 'InternalmarkController@update')->name('intmarks.update');

Route::get('intmarks/destroy/{id}', 'InternalmarkController@destroy');
///

////Supervisor Mark
Route::resource('supervisor', 'SupervisormarkController');

Route::post('supervisor/update', 'SupervisormarkController@update')->name('supervisor.update');

Route::get('supervisor/destroy/{id}', 'SupervisormarkController@destroy');
///

////Shift Semester
Route::resource('absent', 'AbsentstudentController');

Route::post('absent/update', 'AbsentstudentController@update')->name('absent.update');

Route::get('absent/destroy/{id}', 'AbsentstudentController@destroy');
///

////Shift Semester
Route::resource('shiftsemester', 'ShiftController');

Route::post('shiftsemester/update', 'ShiftController@update')->name('shiftsemester.update');

Route::get('shiftsemester/destroy/{id}', 'ShiftController@destroy');
///

////Review Student
Route::resource('review', 'ReviewController');

Route::post('review/update', 'ReviewController@update')->name('review.update');

Route::get('review/destroy/{id}', 'ReviewController@destroy');
///

////Feedback Student
Route::resource('feedback', 'FeedbackController');

Route::post('feedback/update', 'FeedbackController@update')->name('feedback.update');

Route::get('feedback/destroy/{id}', 'FeedbackController@destroy');
///


////Add Student
Route::resource('addstudent', 'AddstudentController');

Route::post('addstudent/update', 'AddstudentController@update')->name('addstudent.update');

Route::get('addstudent/destroy/{id}', 'AddstudentController@destroy');
///

////Update Password
Route::resource('updatepass', 'PasswordController');

Route::post('updatepass/update', 'PasswordController@update')->name('updatepass.update');

Route::get('updatepass/destroy/{id}', 'PasswordController@destroy');
///

////Add Student
Route::resource('addteacher', 'AddteacherController');

Route::post('addteacher/update', 'AddteacherController@update')->name('addteacher.update');

Route::get('addteacher/destroy/{id}', 'AddteacherController@destroy');
///

Route::resource('customers','CustomerController');
 Route::get('customers/{id}/edit/','CustomerController@edit');
 
 //Admin Add Proposal
Route::resource('/proposal', 'AddproposalController');
Route::get('/addproposal', 'AddproposalController@index')->name('student');
Route::get('/myproposal', 'AddproposalController@proposal');
Route::get('/disablelink', 'ProjectController@link');


//PC Student Controller
//data tabale
Route::resource('pcstudent', 'PcstudentController');

Route::post('pcstudent/update', 'PcstudentController@update')->name('pcstudent.update');

Route::get('pcstudent/destroy/{id}', 'PcstudentController@destroy');
///


//data tabale
Route::resource('sample', 'SampleController');

Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');
///


//All Student Info View
Route::resource('allstudent', 'AllstudentController');

///

//Assign Internal Review
Route::resource('internal', 'InternalreviewController');

Route::post('internal/update', 'InternalreviewController@update')->name('internal.update');

Route::get('internal/destroy/{id}', 'InternalreviewController@destroy');
///

////Edit Proposal
Route::resource('editproposal', 'EditproposalController');

Route::post('editproposal/update', 'EditproposalController@update')->name('editproposal.update');

Route::get('editproposal/destroy/{id}', 'EditproposalController@destroy');

////
Route::resource('editstudent', 'EditController');

Route::post('editstudent/update', 'EditController@update')->name('editstudent.update');

Route::get('editstudent/destroy/{id}', 'EditController@destroy');
///



Route::get('/', function () {
    return view('welcome');
});

Route::get('/ourteam', function () {
    return view('team');
});

Route::get('/unauthorized', function () {
    return view('404');
});



Route::get('/old', function () {
    return view('welcome');
});

Auth::routes();

//message
Route::resource('/sentmessage', 'MessageController');
Route::get('/allmessage', 'MessageController@messagelist');

//student
Route::resource('/student', 'ProjectController');
Route::get('/studentdashboard', 'ProjectController@index')->name('student');
Route::get('/myproposal', 'ProjectController@proposal');
Route::get('/disablelink', 'ProjectController@link');

// Route::resource('/student', 'ProjectController');
Route::get('/supervisorinfo', 'ProjectController@displayinfo');

Route::resource('/viewinfo', 'AdminController');
Route::get('api/viewinfo','AdminController@getInitialList');
// Route::get('/allproject', 'AdminController@index1');
Route::get('/viewstudent', 'AdminController@index2');
Route::get('/assignstudentinfo', 'AdminController@assignstudent');
Route::get('/viewdetails/', 'AdminController@index3');
Route::get('/viewdetails/{id}', 'AdminController@index4');
Route::get('/view/{id}/edit', 'AdminController@edit1');
Route::patch('/view/{id}','AdminController@update1');
Route::get('/supervisorsummary', 'AdminController@SupervisorSummary');
Route::get('/marks', 'AdminController@showmarks')->name('marks.showmarks');
Route::get('/allstudentinfo', 'AdminController@allstudentinfo');
Route::get('/pcstudentinfo', 'AdminController@pcallstudentinfo');


Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/showfeedback', 'AdminController@showfeedback');

//Faculty
Route::resource('/studentinfo', 'FacultyController');
Route::get('/faculty', 'FacultyController@faculty');
Route::get('/assignstudent', 'FacultyController@assignstudent');
Route::get('/feedbackstudent', 'FacultyController@feedbackstudent');

Route::post('/panel/users/ban', 'MessageController@banFreelancer');

Route::post('/panel/freelancer/unban', 'MessageController@unbanFreelancer');
Route::post('/panel/freelancer/progress', 'MessageController@progressFreelancer');

Route::get('send-mail','MailSend@mailsend');
Route::get('send','MailSend@create');
Route::get('sendto','MailSend@create');


//Superadmin
Route::get('/superadmin', 'SuperAdminController@superadmin')->name('superadmin');

Route::get('/adminlist', 'SuperAdminController@admininfo')->name('adminlist.admininfo');
Route::get('api/viewinfo','SuperAdminController@getInitialList');

Route::get('adminlist/destroy/{id}', 'SuperAdminController@destroy');





