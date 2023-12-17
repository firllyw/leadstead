<?php

use App\Http\Controllers\Core\ContactController;
use Illuminate\Support\Facades\Route;

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

require_once 'theme-routes.php';

Route::get('/dashboard', function () {
    return view('barebone', ['title' => 'This is Title']);
});

Route::get('/register', function() {
    return view('auth.signup');
})->name('register');

Route::prefix('app')->middleware('auth')->group(function() {
    Route::prefix('contacts')->group(function() {
        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
    });

    Route::get('invoices', function() {
        return view('pages.app.invoice.list', [
            'title' => 'Invoices',
            'description' => 'Invoices',
            'active' => 'invoices'
        ]);
    })->name('invoices');

    Route::get('chats', function() {
        return view('pages.app.chat', [
            'title' => 'Chats',
            'description' => 'Chats',
            'active' => 'chats'
        ]);
    })->name('chats');
});

Route::prefix('dashboard')->group(function() {
    Route::get('search', function() {
        return view('pages.app.search', [
            'title' => 'Search Lead',
            'description' => 'Search for company or persona...',
            'active' => 'search'
        ]);
    })->name('search');
});