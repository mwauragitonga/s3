<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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


Route::get('image-upload', [FileUploadController::class, 'imageUpload'])->name('image.upload');
Route::post('image-upload', [FileUploadController::class, 'imageUploadPost'])->name('image.upload.post');
Route::get('/', function () {
    return view('welcome');
});
