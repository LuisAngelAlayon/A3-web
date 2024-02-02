<?php

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



Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/career/create', function () {
    return view('career.create');
})->name('career.create');

Route::get('/career/index', function () {
    return view('career.index');
})->name('career.index');

Route::get('/career/edit', function () {
    return view('career.edit');
})->name('career.edit');





Route::get('/course/create', function () {
    return view('course.create');
})->name('course.create');

Route::get('/course/index', function () {
    return view('course.index');
})->name('course.index');

Route::get('/course/edit', function () {
    return view('course.edit');
})->name('course.edit');





Route::get('/environment_type/create', function () {
    return view('environment_type.create');
})->name('environment_type.create');

Route::get('/environment_type/index', function () {
    return view('environment_type.index');
})->name('environment_type.index');

Route::get('/environment_type/edit', function () {
    return view('environment_type.edit');
})->name('environment_type.edit');





Route::get('/instructor/create', function () {
    return view('instructor.create');
})->name('instructor.create');

Route::get('/instructor/index', function () {
    return view('instructor.index');
})->name('instructor.index');

Route::get('/instructor/edit', function () {
    return view('instructor.edit');
})->name('instructor.edit');





Route::get('/learning_environment/create', function () {
    return view('learning_environment.create');
})->name('learning_environment.create');

Route::get('/learning_environment/index', function () {
    return view('learning_environment.index');
})->name('learning_environment.index');

Route::get('/learning_environment/edit', function () {
    return view('learning_environment.edit');
})->name('learning_environment.edit');





Route::get('/location/create', function () {
    return view('location.create');
})->name('location.create');

Route::get('/location/index', function () {
    return view('location.index');
})->name('location.index');

Route::get('/location/edit', function () {
    return view('location.edit');
})->name('location.edit');





Route::get('/scheduling_environment/create', function () {
    return view('scheduling_environment.create');
})->name('scheduling_environment.create');

Route::get('/scheduling_environment/index', function () {
    return view('scheduling_environment.index');
})->name('scheduling_environment.index');

Route::get('/scheduling_environment/edit', function () {
    return view('scheduling_environment.edit');
})->name('scheduling_environment.edit');
