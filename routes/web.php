<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleAuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\PrepaidCardController;

use App\Http\Controllers\Admin\RewardRequestController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Reward;
use App\Models\User;
use App\Models\Task;
use App\Models\PrepaidCard;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('welcome');
});





// Routes للمستخدم العادي
Route::middleware(['auth'])->group(function () {
    // المهام
        Route::get('/dashboard', function() {
            return view('dashboard', [
                'points' => auth()->user()->points()->sum('amount')
            ]);
        })->name('dashboard');
    
    
        Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');
       
        Route::post('/tasks/{task}/complete',[TaskController::class, 'complete'])->name('tasks.complete');
    
        Route::get('/rewards',[RewardController::class, 'index'])->name('rewards.index');

        Route::get('/rewards/{reward}/redeem-form', [RewardController::class, 'showRedeemForm'])->name('rewards.redeem-form');
        
        Route::post('/rewards/{reward}/redeem', [RewardController::class, 'redeem'])->name('rewards.redeem');
        


       
       // Route::post('/rewards/{reward}',[RewardController::class, 'complete'])->name('rewards.complete');
    
    });
    


// Routes للمدير (تأكد من وجود middleware )

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // المهام
    Route::resource('tasks', \App\Http\Controllers\Admin\TaskController::class);
    

    // المكافآت
    Route::resource('rewards', \App\Http\Controllers\Admin\RewardController::class);

});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    
    Route::get('/reward-requests', [Admin\RewardRequestController::class, 'index'])
         ->name('requests.index');
         
    Route::put('/reward-requests/{rewardRequest}', [Admin\RewardRequestController::class, 'update'])
         ->name('requests.update');

    Route::get('/notifications', [Admin\NotificationController::class, 'index'])->name('admin.notifications');
    Route::post('/notifications/{id}/read', [Admin\NotificationController::class, 'markAsRead'])->name('admin.notifications.read');

});

// روت جوجل



Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/test-google', function() {
      return Socialite::driver('google')
          ->redirectUrl('http://localhost/auth/google/callback')
          ->redirect();
  });



     
Route::middleware('auth')->group(function () {
Route::get('/redeem-card', [CardController::class, 'showRedeemForm'])->name('cards.redeem');
Route::post('/redeem-card', [CardController::class, 'redeem'])->name('cards.redeem.submit');
});



// قسم المدير
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // كروت النقاط
    Route::get('/cards', [PrepaidCardController::class, 'index'])->name('admin.cards.index');
    Route::get('/cards/create', [PrepaidCardController::class, 'create'])->name('admin.cards.create');
    Route::post('/cards', [PrepaidCardController::class, 'store'])->name('admin.cards.store');
    Route::get('/cards/{id}/edit', [PrepaidCardController::class, 'edit'])->name('admin.cards.edit');
    Route::put('/cards/{id}', [PrepaidCardController::class, 'update'])->name('admin.cards.update');
    Route::delete('/cards/{id}', [PrepaidCardController::class, 'destroy'])->name('admin.cards.destroy');
    Route::post('/cards/bulk-delete', [PrepaidCardController::class, 'bulkDelete'])->name('admin.cards.bulk-delete');
    Route::get('/cards/{id}/print', [PrepaidCardController::class, 'print'])->name('admin.cards.print');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









require __DIR__.'/auth.php';
