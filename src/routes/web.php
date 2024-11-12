<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// indexアクションの呼び出し
Route::get('/', [AuthorController::class, 'index']);
// addアクションの呼び出し
Route::get('/add', [AuthorController::class, 'add']);
// /addにPOSTメソッドでアクセスした時にcreateアクションを呼び出す
Route::post('/add', [AuthorController::class,'create']);
// editアクションの呼び出し
Route::get('/edit', [AuthorController::class, 'edit']);
// 更新処理をする
Route::post('/edit', [AuthorController::class, 'update']);
// deleteページの表示
Route::get('/delete', [AuthorController::class, 'delete']);
// データ削除処理
Route::post('/delete', [AuthorController::class, 'remove']);
// 検索機能
Route::get('/find', [AuthorController::class, 'find']);
Route::post('find', [AuthorController::class, 'search']);

// 暗黙の結合
Route::
get('/author/{author}', [AuthorController::class, 'bind']);

Route::get('/verror', [AuthorController::class, 'verror']);

// bookcontrollerに対応するルーディング
Route::prefix('book')->group(function (){
    Route::get('/', [BookController::class, 'index']);
    Route::get('/add', [BookController::class, 'add']);
    Route::post('/add', [BookController::class, 'create']);
});

// relateアクション
Route::get('/relation', [AuthorController::class, 'relate']);