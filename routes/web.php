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

// トップページの表示
Route::get('/', [HomeController::class, 'index']);

// 認証に関するルートの設定
Auth::routes();

// ログイン後のホームページの表示
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 商品一覧ページの表示
Route::resource('items', ItemController::class); /* 一覧表示 */

// ログインが必要なルートグループ
Route::middleware(['auth'])->group(function () {
    // ホームページの表示
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // 商品関連のルートグループ
    Route::resource('items', ItemController::class);
    Route::group(['middleware' => ['can:admin']], function () {
        Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
        Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('items/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    });
}); 