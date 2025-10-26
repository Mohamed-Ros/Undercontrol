<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ToolController;
Route::prefix('achievements')->group(function () {
    Route::get('/', [AchievementController::class, 'index'])->name('achievements.index');
    Route::get('/{id}', [AchievementController::class, 'show'])->name('achievements.show');
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/{id}', [CourseController::class, 'show'])->name('courses.show');
});



Route::prefix('faqs')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/{id}', [FaqController::class, 'show'])->name('faqs.show');
});


Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{id}', [ProjectController::class, 'show'])->name('projects.show');
});




Route::prefix('features')->group(function () {
    Route::get('/', [FeatureController::class, 'index'])->name('features.index');
    Route::get('/{id}', [FeatureController::class, 'show'])->name('features.show');
});

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::get('/{id}', [SettingController::class, 'show']);
});


Route::prefix('tools')->group(function () {
    Route::get('/', [ToolController::class, 'index'])->name('tools.index');
    Route::get('/{id}', [ToolController::class, 'show'])->name('tools.show');
});
