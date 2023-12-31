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
Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/',  'login')->name('login');
    Route::post('/', 'auth');
    //Route::get('/logout')->name('logout');
    Route::post('/logout', 'logout');
});

Route::prefix('/administrator')->name('administrator.')->middleware('auth')->group(function(){
    Route::get('/', [WineController::class, 'home']);
    /* function(){
        dd($this);
    }*/

    Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function(){
        Route::get('/' , 'index')->name('index');
        Route::get('/new', 'create')->name('create');
        Route::get('/{id}', 'show')->where(['id' => '[0-9]+'])->name('show');
        Route::get('/csrf-token-endpoint', function () {
            return response()->json(['token' => csrf_token()]);
        });
        Route::post('/post', [MessageController::class, 'store']);
    });

    Route::prefix('/cepage')->name('cepage.')->controller(CepageController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/new','create')->name('create')->middleware('auth');
        Route::post('/new', 'store');
        Route::get('/{id}', 'edit')->name('edit')->middleware('auth'); // --> Update
        Route::post('/{cepage}', 'update');
    });

    Route::prefix('/wine')->name('wine.')->controller(WineController::class)->group(function(){
        Route::get('/' , 'home')->name('index');
        Route::get('/new', 'create')->name('create')->middleware('auth');
        Route::post('/new', 'store');
        Route::get('/edit/{wine}', 'edit')/*->where(['id' => '[0-9]+'])*/->name('edit')->middleware('auth');
        Route::post('/edit/{wine}', 'update');
        Route::delete('/edit/{wine}', 'delete');
    });
});

/*Route::middleware(['auth'])->group(function(){
    Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function(){
        Route::get('/' , 'index')->name('index');
    });
});*/


/*BEFORE MOVE*/
Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/',  'login')->name('login');
    Route::post('/', 'auth');
    //Route::get('/logout')->name('logout');
    Route::post('/logout', 'logout');
});


Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function(){
    Route::get('/csrf-token-endpoint', function () {
        return response()->json(['token' => csrf_token()]);
    });
    Route::post('/post', [MessageController::class, 'store']);
});

Route::post('/post', [MessageController::class, 'store']);

Route::get('/csrf-token-endpoint', function () {
    //return response()->json(['token' => csrf_token()]);
});
/*
Route::prefix('/wine')->name('wine.')->controller(WineController::class)->group(function(){
    Route::get('/' , 'home')->name('index');
    Route::get('/new', 'create')->name('create')->middleware('auth');
    Route::post('/new', 'store');
    Route::get('/edit/{wine}', 'edit')/*->where(['id' => '[0-9]+'])*//*->name('edit')->middleware('auth');
    Route::post('/edit/{wine}', 'update');
    Route::delete('/edit/{wine}', 'delete');
});*/

Route::prefix('/type')->name('type.')->group(function(){
    Route::get('/' , function(Request $request){
        return \App\Models\Type::all('id','name');

    })->name('index');

});
/*
Route::prefix('/cepage')->name('cepage.')->controller(CepageController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/new','create')->name('create')->middleware('auth');
    Route::post('/new', 'store');
    Route::get('/{id}', 'edit')->name('edit')->middleware('auth'); // --> Update
    Route::post('/{cepage}', 'update');
});*/

Route::get('/', function () {
    return redirect('/vins/index.html');
});



