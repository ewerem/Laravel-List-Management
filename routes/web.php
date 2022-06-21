<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todo;

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
/*
Route::get('/', function () {
    return view('show');
});
*/

Route::get('/', [todo::class, 'index']);

Route::get('/register', [todo::class, 'registerpage']);

Route::get('/dashboard', [todo::class, 'getList']);

Route::post('/addList', [todo::class, 'store']);

Route::put('/addList/{id}', [todo::class, 'update']);

Route::delete('/deleteList/{id}', [todo::class, 'delete']);

Route::post('/addUser', [todo::class, 'adduser']);

Route::post('/login', [todo::class, 'login']);

Route::post('/logout', [todo::class, 'logout']);