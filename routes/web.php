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
});

Route::get('/live', function () {

    $DEVELOPER_KEY = 'AIzaSyDi6gGeTeRIXVurGikB4bqg36JO2VL-W5U';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);


    $youtube = new Google_Service_YouTube($client);

    $results = $youtube->search->listSearch("id,snippet", [
        'eventType' => 'live',
        'type' => 'video',
        'maxResults' => '20'
    ]);

    $video = null;

    return view('live', compact('results', 'video'));
});

Route::get('/live/{video}', function ($videoId) {

    $DEVELOPER_KEY = 'AIzaSyDi6gGeTeRIXVurGikB4bqg36JO2VL-W5U';
    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);
    $youtube = new Google_Service_YouTube($client);
    $results = $youtube->search->listSearch("id,snippet", [
        'eventType' => 'live',
        'type' => 'video',
        'maxResults' => '20'
    ]);

    $video = $youtube->videos->listVideos('id,snippet,liveStreamingDetails', [
        'id' => $videoId,
    ])->getItems()[0];

    return view('live', compact('results', 'video'));
});

Route::get('/vi', function () {
    return view('vi');
});