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
    TrackController,
    UserController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Login routes
Route::get('/', function () {
    return view('login');
});

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'registerUser']);
// Route::post('/register', [RegisterController::class, 'registerCustomer']);

// Login form for admin, editor, & customer
Route::get("login", [AuthController::class, "index"])->name("login");
Route::post('/login/create', [AuthController::class, 'login'])->name("loginPost");
Route::get("logout", [AuthController::class, "logout"])->name("logout");

// Middleware for authenticated users with role redirection
Route::middleware(['auth', 'role.redirect'])->group(function () {
    // Customer routes
    Route::middleware(['customer'])->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home.index');
        Route::get('track', [TrackController::class, 'index'])->name('track.index');
        Route::post('track-shipment', [TrackController::class, 'track'])->name('shipment.track');
        Route::get('shipmentDetails', [ShipmentDetailsController::class, 'index'])->name('shipmentDetails.index');
        Route::get('contactUs', [ContactUsController::class, 'index'])->name('contactUs.index');
    });

    // Admin routes (can view, create, store)
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");
        Route::resource("orders", OrderController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource("shipments", ShipmentController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource("users", UserController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource("customers", CustomerController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource("payments", PaymentController::class)->only(['index', 'create', 'store', 'show']);
        Route::resource("reports", ReportController::class)->only(['index', 'create', 'store', 'show']);
        Route::get('activities', [AdminActivityController::class, 'index'])->name('activities.index');
        Route::delete('activities/{id}', [AdminActivityController::class, 'destroy'])->name('activities.destroy');
    });

    // Editor routes (can edit, update, delete)
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");
        Route::resource("orders", OrderController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource("shipments", ShipmentController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource("users", UserController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource("customers", CustomerController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource("payments", PaymentController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::resource("reports", ReportController::class)->only(['index', 'edit', 'update', 'destroy']);
        Route::get('activities', [AdminActivityController::class, 'index'])->name('activities.index');
        Route::delete('activities/{id}', [AdminActivityController::class, 'destroy'])->name('activities.destroy');
    });
});

// Public route
Route::get('shipments/{id}/deliver', [ShipmentController::class, 'send']);
