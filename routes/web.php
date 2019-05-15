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
    return view('welcome');
})->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/results', 'HomeController@showResultsPage')->name('results');

Route::get('/voter/startVoting', 'VoterController@startVoting')->name('startVoting');
Route::get('/voter/endVoting', 'VoterController@endVoting')->name('endVoting');
Route::get('/results/perRegion/{id}', 'ElectoralController@resultsPerRegion')->name('resultsPerRegion');
Route::get('/results/perProvince/{id}/{region_id}', 'ElectoralController@resultsPerProvince')->name('resultsPerProvince');
Route::get('/results/perCity/{id}/{province_id}', 'ElectoralController@resultsPerCity')->name('resultsPerCity');
Route::get('/results/perBarangay/{id}/{city_id}', 'ElectoralController@resultsPerBarangay')->name('resultsPerBarangay');
Route::get('/changepassword','HomeController@showChangePasswordForm')->name('changepassword');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::resource('voter', 'VoterController')->except(['destroy']);
Route::resource('admininfo', 'AdmininfoController')->except(['destroy']);
Route::resource('region', 'RegionController')->except(['destroy']);
Route::resource('province', 'ProvinceController')->except(['destroy']);
Route::resource('city', 'CityController')->except(['destroy']);
Route::resource('barangay', 'BarangayController')->except(['destroy']);
Route::resource('candidate', 'CandidateController')->except(['destroy']);
Route::resource('electoral', 'ElectoralController')->except(['destroy']);
Route::resource('partylist', 'PartylistController')->except(['destroy']);
Route::resource('vote', 'VoteController')->except(['destroy']);
Route::resource('votedetail', 'VoteDetailController')->except(['destroy']);
Route::resource('year', 'YearController')->except(['destroy']);
Route::resource('position', 'PositionController')->except(['destroy']);