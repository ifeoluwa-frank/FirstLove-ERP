<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BacentaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bacentas', [BacentaController::class, 'index'])->name('bacenta.index');
    Route::post('/add-bacenta', [BacentaController::class, 'addEdit'])->name('bacenta.add');
    Route::get('/bacenta-members/{id}', [BacentaController::class, 'eachBacentaMember'])->name('bacenta.member');

    Route::get('/members', [MemberController::class, 'index'])->name('member.index');
    Route::post('/member-store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member-create', [MemberController::class, 'create'])->name('member.create');
});


require __DIR__.'/auth.php';
