<?php

use App\Http\Controllers\Ga4Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Services\GoogleAnalytics;
Route::get('/', function (GoogleAnalytics $ga) {
    $visitorsData = $ga->getWebsiteVisitors(7);
    $totalVisitors = $visitorsData->sum('visitors');
    return view('welcome', compact('totalVisitors'));
});

Route::get('/test', [Ga4Controller::class, 'getData']);
