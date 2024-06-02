<?php
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageboardController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageboardController::class, 'index'])->name('index');
Route::get('/tag/{name}', [ImageboardController::class, 'tag'])->name('tag');
Route::post('/tag/search', [ImageboardController::class, 'tagSearch'])->name('tag_search');

Route::get('/image/show/{id}', [ImageController::class, 'show'])->name('show_image');
Route::get('/image/create', [ImageController::class, 'create'])->name('create_image')->middleware(['auth']);
Route::post('/image/store', [ImageController::class, 'store'])->name('store_image')->middleware(['auth']);
Route::get('/image/edit/{id}', [ImageController::class, 'edit'])->name('image.edit')->middleware(['auth']);
Route::post('/image/update/{id}', [ImageController::class, 'update'])->name('image.update')->middleware(['auth']);
Route::get('/image/destroy/confirm/{id}', [ImageController::class, 'destroyConfirm'])->name('image.destroy.confirm')->middleware(['auth']);
Route::get('/image/destroy/{id}', [ImageController::class, 'destroy'])->name('image.destroy')->middleware(['auth']);

Route::get('profile/{id}/search', [AuthController::class, 'search'])->name('profile.search');
Route::get('/profile/{id}', [AuthController::class, 'profile'])->name('profile');

Route::get('/user/edit/{id}', function ($id) {return view('auth.useredit', ['user' => User::findOrFail($id)]);})->name('user.edit');
Route::put('/user/update/{id}', [AuthController::class, 'update'])->name('user.update');

Route::get('/auth/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/auth/registration/store', [AuthController::class, 'store'])->name('registration.store');
Route::get('/auth/logout', [AuthController::class, 'destroy'])->name('auth.logout');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login/post', [AuthController::class, 'loginPOST'])->name('auth.login.post');
