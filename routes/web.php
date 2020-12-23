<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::get('/indexcheck', [IndexController::class, 'indexcheck'])->name('indexcheck');
Route::post('/indexcheck', [IndexController::class, 'indexcheck'])->name('indexcheck');

Route::get('/indexrelevance', [IndexController::class, 'indexrelevance'])->name('indexrelevance');
Route::post('/indexrelevance', [IndexController::class, 'indexrelevance'])->name('indexrelevance');

Route::get('/indextitle', [IndexController::class, 'indextitle'])->name('indextitle');
Route::post('/indextitle', [IndexController::class, 'indextitle'])->name('indextitle');

Route::get('/indexlowprice', [IndexController::class, 'indexlowprice'])->name('indexlowprice');
Route::post('/indexlowprice', [IndexController::class, 'indexlowprice'])->name('indexlowprice');

Route::get('/indexhighprice', [IndexController::class, 'indexhighprice'])->name('indexhighprice');
Route::post('/indexhighprice', [IndexController::class, 'indexhighprice'])->name('indexhighprice');

Route::get('/indexcheapest', [IndexController::class, 'indexcheapest'])->name('indexcheapest');
Route::post('/indexcheapest', [IndexController::class, 'indexcheapest'])->name('indexcheapest');

Route::get('/indexdetail/{id}', [IndexController::class, 'indexdetail']);

Route::get('/pending/{id}', [AdminController::class, 'pending'])->name('pending');
Route::get('/sent/{id}', [AdminController::class, 'sent'])->name('sent');
Route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder'])->name('deleteorder');

Route::get('/orderby/{orden}', [AdminController::class, 'orderby'])->name('orderby');

Route::get('/addorder', [AdminController::class, 'addorder'])->name('addorder');
Route::post('/addorder', [AdminController::class, 'addorder'])->name('addorder');
Route::post('/addorder', [AdminController::class, 'saveaddorder'])->name('saveaddorder');

Route::get('/addproducto', [AdminController::class, 'addproducto'])->name('addproducto');
Route::post('/addproducto', [AdminController::class, 'saveaddproducto'])->name('saveaddproducto');

Route::get('/editproducto/{id}', [AdminController::class, 'editproducto'])->name('editproducto');
Route::post('/editproducto/{id}', [AdminController::class, 'editproducto'])->name('editproducto');
Route::get('/editproducto', [AdminController::class, 'saveeditproducto'])->name('saveeditproducto');
Route::post('/editproducto', [AdminController::class, 'saveeditproducto'])->name('saveeditproducto');
Route::get('/deleteproducto/{id}', [AdminController::class, 'deleteproducto'])->name('deleteproducto');
Route::post('/deleteproducto/{id}', [AdminController::class, 'deleteproducto'])->name('deleteproducto');
Route::delete('/deleteproducto/{id}', [AndminController::class, 'deleteproducto'])->name('deleteproducto');


Route::get('/car/{id}', [CartController::class, 'indexcar'])->name('indexcar');
Route::post('/car/{id}', [CartController::class, 'indexcar'])->name('indexcar');
Route::post('/delete', [CartController::class, 'indexcardelete'])->name('indexcardelete');
Route::delete('/delete', [CartController::class, 'indexcardelete'])->name('indexcardelete');

Route::get('/checkout', [CartController::class, 'indexcheckout'])->name('indexcheckout');
Route::post('/checkout', [CartController::class, 'indexcheckout'])->name('indexcheckout');
Route::get('/checkout2', [CartController::class, 'indexcheckout2'])->name('indexcheckout2');
Route::post('/checkout2', [CartController::class, 'indexcheckout2'])->name('indexcheckout2');

Route::get('/mainproducto', [AdminController::class, 'indexadminproducto'])->name('indexadminproducto');
Route::post('/mainproducto', [AdminController::class, 'indexadminproducto'])->name('indexadminproducto');
Route::get('/mainorder', [AdminController::class, 'indexadminorder'])->name('indexadminorder');
Route::post('/mainorder', [AdminController::class, 'indexadminorder'])->name('indexadminorder');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
