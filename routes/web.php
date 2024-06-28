<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
    User::create(['name' => 'admin', 'last_name' => 'g', 'email' => 'admin@gmail.com', 'password' => Hash::make('12456789')]);
    return 'asd';
    return view('welcome');
});
