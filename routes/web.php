<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('items', ItemController::class); /* 一覧表示 */

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
    Route::get('items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
    Route::post('update', [ItemController::class, 'update'])->name('items.update');
    Route::post('delete/{id}', [ItemController::class, 'delete'])->name('delete');
});
