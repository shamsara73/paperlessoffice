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

Route::get('/', function () {
    return view('login');
});

Route::get('/home', 'MainController@index');
Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::post('/main/storeJabatan', 'MainController@storeJabatan');
Route::post('/main/destroyJabatan/{id}', 'MainController@destroyJabatan');
Route::get('/main/destroyJabatan', 'MainController@destroyJabatan');
Route::get('main/home', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
Route::get('/register', 'MainController@register');
Route::get('main/profil', 'MainController@profil');
Route::get('main/jabatan', 'MainController@jabatan');
Route::post('main/jabatan', 'MainController@jabatan');
Route::post('/registerPost', 'MainController@registerPost');
Route::post('/registerCancelPost', 'MainController@registerCancelPost');




// Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('sendattachmentemail','MailController@attachment_email');

Route::post('/main/storeanggota', 'MainController@storeanggota');
Route::post('/main/storemeeting', 'MainController@storemeeting');

Route::post('/main/destroyanggota/{id}', 'MainController@destroyanggota');
Route::post('main/anggota', 'MainController@anggota');
Route::get('main/anggota', 'MainController@anggota');

Route::post('/main/printMeeting/{id}','PrintController@printMeeting');
Route::post('/main/printAbsent/{id}','PrintController@printAbsent');

Route::post('/main/sendMeeting/{id}','MailController@sendMeeting');
Route::post('/main/sendRevisionMeeting/{id}','MailController@sendRevisionMeeting');
Route::post('/main/sendCanceledMeeting/{id}','MailController@sendCanceledMeeting');

Route::get('main/tambahanggota', 'MainController@tambahpartisipan');
Route::get('main/tambahjabatan', 'MainController@tambahjabatan');
Route::get('main/tambahundangan', 'MainController@tambahundangan');


Route::post('main/undangan', 'MainController@undangan');
Route::get('main/undangan', 'MainController@undangan');

