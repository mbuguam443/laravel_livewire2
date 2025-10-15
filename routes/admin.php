<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\Users\ListUsers;


        Route::get('dashboard',Dashboardcontroller::class)->name('dashboard');
        Route::get('users',ListUsers::class)->name('users');
        Route::get('appointments',ListAppointments::class)->name('appointments');
        Route::get('appointments/create',CreateAppointmentForm::class)->name('appointments.create');
        Route::get('appointments/{appointment}/edit',UpdateAppointmentForm::class)->name('appointments.edit');




?>
