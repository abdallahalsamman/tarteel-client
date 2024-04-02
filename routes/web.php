<?php

use App\Livewire\EditUserComponent;
use App\Livewire\IndexUserComponent;
use App\Livewire\CreateUserComponent;
use App\Livewire\IndexInvoiceComponent;
use App\Livewire\AcceptedInvitationComponent;
use App\Http\Controllers\Auth\LoginController;
use App\Livewire\EditTutoringSessionComponent;
use App\Livewire\IndexTutoringSessionComponent;
use App\Livewire\CreateTutoringSessionComponent;
use App\Http\Controllers\ConfirmedEmailController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    Route::get('tutoring-sessions', IndexTutoringSessionComponent::class)->name('tutoring-sessions.index');
    Route::get('tutoring-sessions/create', CreateTutoringSessionComponent::class)->name('tutoring-sessions.create');
    Route::get('tutoring-sessions/{id}/edit', EditTutoringSessionComponent::class)->name('tutoring-sessions.edit');

    Route::get('invoices', IndexInvoiceComponent::class)->name('invoices.index');
    Route::get('invoices/{user}', IndexInvoiceComponent::class)->name('invoices.show');

    Route::get('users', IndexUserComponent::class)->name('users.index');
    Route::get('users/create', CreateUserComponent::class)->name('users.create');
    Route::get('users/{user}/edit', EditUserComponent::class)->name('users.edit');
});
