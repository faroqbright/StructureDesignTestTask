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


foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
        Route::get('/', function () {
            return 'centrel domain';

            $tenant1 = App\Models\Tenant::create(['id' => 'foo']);
            $tenant1->domains()->create(['domain' => '127.0.0.1:8000']);

            $tenant2 = App\Models\Tenant::create(['id' => 'bar']);
            $tenant2->domains()->create(['domain' => '127.0.0.1:1000']);
            return 'tenant created';
        });
    });
}
