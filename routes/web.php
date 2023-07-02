<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\BorrowingsController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   

    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    // All Books
    Route::get('/books', [BookController::class, 'index'])->name('books');

    //show specific Book
    Route::get('/Book/{id}', [BookController::class, 'show'])->name('show.book');

    // Create Books
    Route::get('/books/create', [BookController::class, 'create'])->name('create-book');
    Route::post('/books/create', [BookController::class, 'store'])->name('store-book');

    // Edit Books
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit-book');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('update-book');

    // Delete Book
    Route::get('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');

    // All Visitors
    Route::get('/visitors', [VisitorController::class, 'viewvisitor'])->name('visitors');

    //show specific Visitor
    Route::get('/visitors/{id}', [VisitorController::class, 'show'])->name('show.visitors');

    // Create Visitors
    Route::get('/visitors/create', [VisitorController::class, 'create'])->name('create-visitor');
    Route::post('/visitors/create', [VisitorController::class, 'store'])->name('store-visitor');

    // Edit Visitors
    Route::get('/visitors/{id}/edit', [VisitorController::class, 'edit'])->name('edit-visitor');
    Route::put('/visitors/{id}', [VisitorController::class, 'update'])->name('update-visitor');

    // Delete Visitor
    Route::get('/visitors/delete/{id}}',[VisitorController::class,'destroy'])->name('visitor-destroy');

    // All Borrowings
    Route::get('/borrowings', [BorrowingsController::class, 'viewborrowings'])->name('borrowings');

    // Create Borrowings
    Route::get('/borrowing/create', [BorrowingsController::class, 'createborrowing'])->name('create-borrowing');
    Route::post('/borrowing/create', [BorrowingsController::class, 'store'])->name('store-borrowing');

    // Edit Borrowings
    Route::get('/borrowings/{id}/edit', [BorrowingsController::class, 'edit'])->name('edit-borrowing');
    Route::put('/borrowings/{id}', [BorrowingsController::class, 'update'])->name('update-borrowing');

    // Delete Borrowing
    Route::get('/borrowings/delete/{id}', [BorrowingsController::class, 'destroy'])->name('borrowing.destroy');
});
