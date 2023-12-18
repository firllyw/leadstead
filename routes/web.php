<?php

use App\Http\Controllers\Core\ContactController;
use App\Http\Controllers\Core\JobController;
use App\Http\Controllers\Core\TalentController;
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

Route::get('/profile', function() {
    return view('pages.user.profile', [
        'title' => 'Profile',
        'description' => 'Profile',
        'active' => 'profile'
    ]);
});

Route::get('/register', function() {
    return view('auth.signup');
})->name('register');

Route::prefix('app')->middleware('auth')->group(function() {
    Route::prefix('contacts')->group(function() {
        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
    });

    Route::prefix('jobs')->group(function() {
        Route::get('/', [JobController::class, 'index'])->name('jobs');
        Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
        Route::get('/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/{id}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/{id}', [JobController::class, 'deactivate'])->name('jobs.deactivate');
    });

    Route::prefix('talents')->group(function() {
        Route::get('/', [TalentController::class, 'index'])->name('talents');
        Route::get('/{email}', [TalentController::class, 'show'])->name('talents.show');
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