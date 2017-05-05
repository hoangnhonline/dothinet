<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
require (__DIR__ . '/Routes/backend.php');
require (__DIR__ . '/Routes/frontend.php');
Route::get('/crawler', ['uses' => 'CrawlerController@ward', 'as' => 'crawler']);
Route::get('/project', ['uses' => 'CrawlerController@project', 'as' => 'project']);
Route::get('/street', ['uses' => 'CrawlerController@street', 'as' => 'street']);