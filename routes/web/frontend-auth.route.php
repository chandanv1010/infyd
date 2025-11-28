<?php  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CustomerController;

/* FRONTEND CUSTOMER AUTHENTICATION ROUTES */
Route::group(['middleware' => ['locale']], function () {
    
    // Login routes
    Route::get('dang-nhap.html', [AuthController::class, 'index'])->name('fe.auth.login');
    Route::post('dang-nhap', [AuthController::class, 'login'])->name('fe.auth.dologin');
    
    // Register routes
    Route::get('dang-ky.html', [AuthController::class, 'register'])->name('customer.register');
    Route::post('dang-ky', [AuthController::class, 'registerAccount'])->name('customer.reg');
    
    // Forgot password routes
    Route::get('quen-mat-khau.html', [AuthController::class, 'forgotCustomerPassword'])->name('forgot.customer.password');
    Route::post('quen-mat-khau', [AuthController::class, 'verifyCustomerEmail'])->name('customer.password.email');
    Route::get('cap-nhat-mat-khau.html', [AuthController::class, 'updatePassword'])->name('customer.update.password');
    Route::post('cap-nhat-mat-khau', [AuthController::class, 'changePassword'])->name('customer.password.reset');
    
    // Customer profile routes (require authentication)
    Route::group(['middleware' => ['auth:customer']], function () {
        Route::get('tai-khoan.html', [CustomerController::class, 'profile'])->name('customer.profile');
        Route::post('tai-khoan/cap-nhat', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
        Route::get('tai-khoan/doi-mat-khau.html', [CustomerController::class, 'passwordForgot'])->name('customer.password.forgot');
        Route::get('dang-xuat', [CustomerController::class, 'logout'])->name('customer.logout');
    });
    
    // Alias routes for backward compatibility
    Route::get('buyer/login', [AuthController::class, 'index'])->name('buyer.login');
    Route::get('buyer/signup', [AuthController::class, 'register'])->name('buyer.signup');
    Route::get('buyer/profile', [CustomerController::class, 'profile'])->name('buyer.profile')->middleware('auth:customer');
});

