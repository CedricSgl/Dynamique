<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CepageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\WineController;
use Illuminate\Http\Request;
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
Route::prefix('/login')->name('login.')->controller(AuthController::class)->group(function(){
    Route::get('/',  'login')->name('login');
    Route::post('/', 'auth');
    Route::post('logout');
});


Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function(){
    Route::get('/' , 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::get('/{id}', 'show')->where(['id' => '[0-9]+'])->name('show');
});

Route::prefix('/wine')->name('wine.')->controller(WineController::class)->group(function(){
    Route::get('/' , 'index')->name('index');
    Route::get('/new', 'create')->name('create')->middleware('auth');
    Route::post('/new', 'store');
    Route::get('/edit/{wine}', 'edit')/*->where(['id' => '[0-9]+'])*/->name('edit')->middleware('auth');
    Route::post('/edit/{wine}', 'update');
});

Route::prefix('/type')->name('type.')->group(function(){
    Route::get('/' , function(Request $request){
        /*$type = new \App\Models\Type();
        $type->name = 'Blanc';
        $type->save();
        return $type;*/
        return \App\Models\Type::all('id','name');

    })->name('index');
    
});

Route::prefix('/cepage')->name('cepage.')->controller(CepageController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/new','create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{id}', 'show')->name('show'); // --> Update
    
    /*$cepage = new \App\Models\Cepage();
    $cepage->name = '';*/
});

Route::get('/', function () {
    return view('welcome');
});



