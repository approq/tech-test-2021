<?php

use App\Http\Controllers\LawController;
use Illuminate\Support\Facades\Route;

Route::apiResources(['laws' => LawController::class,]);
