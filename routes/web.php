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

Route::get('/feed', [NewsController::class, '__invoke'])->name('news.__invoke');

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware(['permission:Gestão de Notícias: Cadastrar Notícia']);
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware(['permission:Gestão de Notícias: Editar Notícia']);
    Route::match(['put', 'patch'], '/post/{post}', [PostController::class, 'update'])->name('post.update');

    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy')->middleware(['permission:Gestão de Notícias: Remover Notícia']);
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['role:Administrador']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware(['permission:Gestão de Usuários: Listagem de Usuários']);

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware(['permission:Gestão de Usuários: Cadastrar Usuário']);
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware(['permission:Gestão de Usuários: Editar Usuário']);
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['permission:Gestão de Usuários: Remover Usuário']);

    Route::get('/user/{id}/role', [UserController::class, 'role'])->name('user.role')->middleware(['permission:Gestão de Usuários: Perfil do Usuário']);

    Route::put('/user/{id}/role/sync', [UserController::class, 'roleSync'])->name('user.roleSync');
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['role:Administrador']], function () {
    Route::get('/role', [RoleController::class, 'index'])->name('role.index')->middleware(['permission:Gestão de Perfis: Listagem de Perfis']);

    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create')->middleware(['permission:Gestão de Perfis: Cadastrar Perfil']);
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');

    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware(['permission:Gestão de Perfis: Editar Perfil']);
    Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');

    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware(['permission:Gestão de Perfis: Remover Perfil']);

    Route::get('/role/{id}/permission', [RoleController::class, 'permission'])->name('role.permission')->middleware(['permission:Gestão de Perfis: Permissões do Perfil']);

    Route::put('/role/{id}/permission/sync', [RoleController::class, 'permissionSync'])->name('role.permissionSync');
});

/*************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['role:Desenvolvedor']], function () {
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');

    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');

    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});
