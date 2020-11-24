<?php

use App\Helpers\FirstAccess;
use App\Http\Livewire\Product\Create;
use App\Http\Livewire\Product\HomeProducts;
use App\Http\Livewire\Product\ProductShow;
use App\Http\Livewire\Product\ShowUserProduct;
use App\Http\Livewire\User\UserFormCreate;
use App\Http\Livewire\User\UserList;
use App\Http\Livewire\User\UserShow;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create 3 great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'inactive'], function () {
    
        // Users Routes
    Route::group(
        ['middleware' => ['auth','is-admin'] , // Middleware ,Só o admin pode acecssar a tela de usuarios
            'prefix' => 'users' ,  // Prefixo da url
            'as' => 'users.'       // Name apelido
        ], function () {
                Route::get('/', [UserList::class,"index"])->name("index");
                Route::get('{user}/show', [UserShow::class,'show'])->name("show");
                Route::get("create",[UserFormCreate::class,"create"])->name("create");

    });
    // Products Routes
    Route::group(
        ['middleware' => ['auth'] ,
         'prefix' => 'products',
         'as' => 'products.'
        ], function () {
              Route::get('/',[HomeProducts::class,"index"])->name("index");
              Route::get("{product}/show",[ProductShow::class,'show'])->name("show");
              Route::get("create",[Create::class,"create"])->name("create");   
    });

});

// Route::get("/teste",function() {

//     $teste = Artisan::call('make:new-user');
//     dd($teste);
// });

