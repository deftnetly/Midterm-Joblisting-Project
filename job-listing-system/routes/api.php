<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| This course-style project focuses on web routes and Blade views, so the
| API file is intentionally left minimal.
|
*/

Route::get('/status', function () {
    return ['status' => 'ok'];
});
