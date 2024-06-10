<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PuntajesController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PlayerController;
use App\Models\Jugador;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AuthController::class,'login']);

Route::post('login', [AuthController::class,'AuthLogin']);

Route::get('signup', function () { return view('auth.register');});

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

Route::get('logout', [AuthController::class,'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class,'reset']);
Route::post('reset/{token}', [AuthController::class,'PostReset']);

//Route::get('admin/admin/list', function () {
//    return view('admin.admin.list');
//});


Route::group (['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class,'dashboard']);
    //Route::get('admin/players/list', [AdminController::class,'list']);
    Route::get('admin/admin/add', [AdminController::class,'add']);
    Route::post('admin/admin/add', [AdminController::class,'insert'])->name('admin.admin.add');

    Route::get('admin/admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);

 
    
    Route::delete('admin/admin/list/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    
    Route::get('admin/admin/list', [AdminController::class,'list']);
    Route::get('admin/menu', [AdminController::class, 'showMenu']);

    Route::get('admin/players/list', [JugadorController::class,'list']);
    Route::get('admin/players/add', [JugadorController::class,'add']);
    Route::post('admin/players/add', [JugadorController::class,'insert'])->name('admin.players.add');

    Route::get('admin/players/edit/{id}', [JugadorController::class,'edit']);
    Route::post('admin/players/edit/{id}', [JugadorController::class,'update']);
    Route::get('admin/players/delete/{id}', [JugadorController::class,'delete']);

    Route::delete('admin/players/list/{id}', [JugadorController::class, 'delete'])->name('players.delete');

});


Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class,'dashboard']);
});


Route::group(['middleware' => 'player'], function(){
    Route::get('player/game', [DashboardController::class,'dashboard']);
    Route::get('player/game', [PlayerController::class, 'showGame']);
    Route::post('player/guardarPuntaje',[PuntajesController::class,"guardarPuntaje"])->name("guardarPuntaje")->middleware("auth");

    Route::get('player/menu', [PlayerController::class, 'showMenu']);
    Route::get('player/puntajes', [PuntajesController::class, 'showPuntaje']);
    Route::get('player/perfil', [PerfilController::class, 'showPerfil']);
    Route::post('/perfil/{id}/update', [PerfilController::class, 'update'])->name('perfil.update');
    
    Route::get('/perfil', [PlayerController::class, 'showProfileEditor'])->name('perfil');
    Route::get('/menu', [PlayerController::class, 'showProfileEditor'])->name('perfil');

    

});



Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class,'dashboard']);
});
