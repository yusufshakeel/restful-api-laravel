<?php

use Illuminate\Http\Request;

use App\Participant;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('participants', 'ParticipantController@index');

Route::get('participants/{id}', 'ParticipantController@participantById');

Route::get('participants/{id}/{passcode}', 'ParticipantController@participantCompleteData');

Route::get('participants/page/{page}/{limit}', 'ParticipantController@fetchByPage');

Route::delete('participants/{id}/{passcode}', 'ParticipantController@deleteParticipant');

Route::put('participants/{id}/{passcode}', 'ParticipantController@updateParticipant');

Route::post('participants', 'ParticipantController@createParticipant');
