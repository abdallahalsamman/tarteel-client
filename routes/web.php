<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\EditRoleComponent;
use App\Http\Livewire\EditUserComponent;
use App\Http\Livewire\IndexRoleComponent;
use App\Http\Livewire\IndexUserComponent;
use App\Http\Livewire\CreateRoleComponent;
use App\Http\Livewire\CreateUserComponent;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfirmedEmailController;
use App\Http\Livewire\AcceptedInvitationComponent;
use App\Http\Livewire\EditTutoringSessionComponent;
use App\Http\Livewire\IndexTutoringSessionComponent;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Livewire\CreateTutoringSessionComponent;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Profile\UserController as ProfileUserController;

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('accepted-invitations/create', AcceptedInvitationComponent::class)
    ->name('accepted-invitations.create');

Route::get('confirmed-emails/store', [ConfirmedEmailController::class, 'store'])
    ->name('confirmed-emails.store');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    Route::get('tutoring-sessions', IndexTutoringSessionComponent::class)->name('tutoring-sessions.index');
    Route::get('tutoring-sessions/create', CreateTutoringSessionComponent::class)->name('tutoring-sessions.create');
    Route::get('tutoring-sessions/{id}/edit', EditTutoringSessionComponent::class)->name('tutoring-sessions.edit');

    Route::get('invoices', [HomeController::class, 'index'])->name('invoices.index');
    Route::get('invoice', [HomeController::class, 'index'])->name('invoice.index');

    Route::group(
        ['prefix' => 'profile'],
        function () {
            Route::get('/', [ProfileUserController::class, 'index'])->name('profile.users.index');
        }
    );

    Route::middleware(['authorization'])->group(function () {
        Route::get('users', IndexUserComponent::class)->name('users.index');
        Route::get('users/create', CreateUserComponent::class)->name('users.create');
        Route::get('users/{user}/edit', EditUserComponent::class)->name('users.edit');

        Route::get('roles', IndexRoleComponent::class)->name('roles.index');
        Route::get('roles/create', CreateRoleComponent::class)->name('roles.create');
        Route::get('roles/{role}/edit', EditRoleComponent::class)->name('roles.edit');
    });
});
