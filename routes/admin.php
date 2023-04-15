<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Managements\AdminController;
use App\Http\Controllers\Admin\Managements\RoleController;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\LanguageController;

use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Setting\WebsitController;
use App\Http\Controllers\Admin\Setting\ContactController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:admin', 'Setlocale'
])->group(function () {
       
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('language/{language:code}', [IndexController::class, 'changeLanguage'])->name('changeLanguage');

    //managements
    Route::name('managements.')->prefix('managements')->group(function() {

        //admins
        Route::controller(AdminController::class)
            ->prefix('admins')->name('admins.')
            ->group(function () {

                Route::get('data', 'data')->name('data');
                Route::post('status', 'status')->name('status');
                Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

            });
        Route::resource('admins', AdminController::class);

        //roles
        Route::controller(RoleController::class)
            ->prefix('roles')->name('roles.')
            ->group(function () {

                Route::get('data', 'data')->name('data');
                Route::post('status', 'status')->name('status');
                Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

            });
        Route::resource('roles', RoleController::class);

        //roles
        Route::controller(LanguageController::class)
            ->prefix('languages')->name('languages.')
            ->group(function () {

                Route::get('data', 'data')->name('data');
                Route::post('status', 'status')->name('status');
                Route::delete('bulk_delete', 'bulkDelete')->name('bulk_delete');

            });
        Route::resource('languages', LanguageController::class);

    });//end of managements

    //settings
    Route::name('settings.')->prefix('settings')->group(function() {

        //settings
        Route::controller(ContactController::class)->group(function () {

            Route::get('contact', 'index')->name('contact');
            Route::post('contact/store', 'store')->name('contact.store');

        });

        Route::controller(WebsitController::class)->group(function () {

            Route::get('websit', 'index')->name('websit');
            Route::post('websit/store', 'store')->name('websit.store');

        });

    });//end of managements


    //sliders
    Route::resource('sliders', SliderController::class)->except('show');
    Route::controller(SliderController::class)
        ->prefix('sliders')->name('sliders.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::post('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });

    //partners
    Route::resource('partners', PartnerController::class)->except('show');
    Route::controller(PartnerController::class)
        ->prefix('partners')->name('partners.')
        ->group(function () {

            Route::get('data', 'data')->name('data');
            Route::post('status', 'status')->name('status');
            Route::post('bulk_delete', 'bulkDelete')->name('bulk_delete');

        });

});