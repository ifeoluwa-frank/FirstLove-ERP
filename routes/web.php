<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\BacentaController;
// use App\Http\Controllers\BacentaAuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MinistryController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Bacenta\Auth\BacentaAuthController;
use App\Http\Controllers\Bacenta\MembersController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // BACENTA CONTROLLER ROUTES
        Route::get('/bacentas', [BacentaController::class, 'index'])->name('bacenta.index');
        Route::post('/add-bacenta', [BacentaController::class, 'addEdit'])->name('bacenta.add');
        Route::get('/bacenta-members/{id}', [BacentaController::class, 'eachBacentaMember'])->name('bacenta.member');

        // MEMBER CONTROLLER ROUTES
        Route::get('/members', [MemberController::class, 'index'])->name('member.index');
        Route::post('/member-store', [MemberController::class, 'store'])->name('member.store');
        Route::get('/member-create', [MemberController::class, 'create'])->name('member.create');
        Route::get('/member-details/{id}', [MemberController::class, 'edit'])->name('member.details');
        Route::put('/member-update/{id}', [MemberController::class, 'update'])->name('member.update');

        // MINISTRY CONTROLLER ROUTES
        Route::get('/ministries', [MinistryController::class, 'index'])->name('ministry.index');
        Route::post('/add-update-ministry', [MinistryController::class, 'addEdit'])->name('ministry.addEdit');

        // SERVICE CONTROLLER ROUTES
        Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
        Route::post('/add-update-service', [ServiceController::class, 'addEdit'])->name('service.addEdit');

        // ATTENDANCE CONTROLLER ROUTES
        Route::prefix('attendance')->group(function () {
            Route::get('/', [AttendanceController::class, 'index'])->name('attendance.index');
            Route::get('/record', [AttendanceController::class, 'record'])->name('attendance.record');
            Route::get('/busing', [AttendanceController::class, 'busing_home'])->name('attendance.busing');
            Route::post('/busing-submit', [AttendanceController::class, 'saveBusingAttendance'])->name('attendance.busing.submit');
            Route::post('/headcount', [AttendanceController::class, 'saveHeadcount'])->name('attendance.headcount');
        });
    });
});

// DASHBOARD ROUTE
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:web,bacenta', 'verified'])->name('dashboard');


// BACENTA AUTH & ROUTES 

Route::prefix('bacenta')->group(function () {
    Route::get('login', [BacentaAuthController::class, 'showLoginForm'])->name('bacenta.login');
    Route::post('login', [BacentaAuthController::class, 'login']);
    Route::post('logout', [BacentaAuthController::class, 'logout'])->name('bacenta.logout');

    // ALL BACENTA ROUTES GOES HERE
    Route::middleware('auth:bacenta')->group(function () {
        Route::get('dashboard', function () {
            return view('bacenta.dashboard');
        })->name('bacenta.dashboard');

        Route::get('member', [MembersController::class, 'index'])->name('members.index');
    });
});

require __DIR__.'/auth.php';
