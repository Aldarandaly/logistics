<?php

use App\Http\Controllers\{
    AdminActivityController,
    AuthController,
    ContactUsController,
    CustomerController,
    DashboardController,
    HomeController,
    OrderController,
    PaymentController,
    ReportController,
    ShipmentController,
    ShipmentDetailsController,
    ShowContactUsController,
    SignInController,
    TrackController,
    UserController,
};
use Illuminate\Support\Facades\Route;

// Login routes
Route::get('/', function () {
    return view('login');
})->name('login');


// Login form for admin, editor, & customer
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginPost');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [SignInController::class, 'index'])->name('register');
Route::post('register', [SignInController::class, 'registerCustomer'])->name('register.customer');

// Middleware for authenticated users with role redirection
Route::middleware(['auth:web'])->group(function () {
    // Admin routes
    Route::prefix('admin')->middleware('role.redirect')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('shipments', ShipmentController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('payments', PaymentController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('reports', ReportController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource('ShowContactUs', ShowContactUsController::class);
        Route::get('activities', [AdminActivityController::class, 'index'])->name('activities.index');
        Route::delete('activities/{id}', [AdminActivityController::class, 'destroy'])->name('activities.destroy');
    });

    // Editor routes
    Route::prefix('admin')->middleware('role.redirect')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('orders', OrderController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('shipments', ShipmentController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('customers', CustomerController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('payments', PaymentController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('reports', ReportController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource('ShowContactUs', ShowContactUsController::class);
        Route::get('activities', [AdminActivityController::class, 'index'])->name('activities.index');
        Route::delete('activities/{id}', [AdminActivityController::class, 'destroy'])->name('activities.destroy');
    });
});
Route::middleware(['auth:customer'])->group(function () {
    // Customer routes
    Route::prefix('customer')->middleware('role.redirect')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home.index');
        Route::get('track', [TrackController::class, 'index'])->name('track.index');
        Route::post('track-shipment', [TrackController::class, 'track'])->name('shipment.track');
        Route::get('shipmentDetails', [ShipmentDetailsController::class, 'index'])->name('shipmentDetails.index');
        Route::get('contactUs', [ContactUsController::class, 'index'])->name('contactUs.index');
        Route::post('contactUs', [ContactUsController::class, 'store'])->name('contactUs.store');
    });
});

// Public route
Route::get('shipments/{id}/deliver', [ShipmentController::class, 'send']);
