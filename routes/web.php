<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Portal\NewsController;

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

Auth::routes([
    'register' => false
]);

/*************************************************************/

Route::get('/', [NewsController::class, 'index'])->name('news.index');

Route::get('{id}/details', [NewsController::class, 'show'])->name('news.show');

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::match(['put', 'patch'], '/post/{post}', [PostController::class, 'update'])->name('post.update');

    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/user/{id}/role', [UserController::class, 'role'])->name('user.role');

    Route::put('/user/{id}/role/sync', [UserController::class, 'roleSync'])->name('user.roleSync');
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');

    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');

    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');

    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/role/{id}/permission', [RoleController::class, 'permission'])->name('role.permission');

    Route::put('/role/{id}/permission/sync', [RoleController::class, 'permissionSync'])->name('role.permissionSync');
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');

    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');

    Route::post('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});
