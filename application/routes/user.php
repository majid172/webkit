<?php
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\EpisodeController;
use App\Http\Controllers\RatingController;

Route::namespace('User\Auth')->name('user.')->group(function () {


    Route::controller('LoginController')->group(function(){
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('/login/google/redirect','googleLogin')->name('login.google');
        Route::get('logout', 'logout')->name('logout');
    });


    Route::controller('RegisterController')->group(function(){
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'register')->middleware('registration.status');
        Route::post('check-mail', 'checkUser')->name('checkUser');
    });

    Route::controller('ForgotPasswordController')->group(function(){
        Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'sendResetCodeEmail')->name('password.email');
        Route::get('password/code-verify', 'codeVerify')->name('password.code.verify');
        Route::post('password/verify-code', 'verifyCode')->name('password.verify.code');
    });
    Route::controller('ResetPasswordController')->group(function(){
        Route::post('password/reset', 'reset')->name('password.update');
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    });
});

Route::middleware('auth')->name('user.')->group(function () {
    //authorization
    Route::namespace('User')->controller('AuthorizationController')->group(function(){
        Route::get('authorization', 'authorizeForm')->name('authorization');
        Route::get('resend/verify/{type}', 'sendVerifyCode')->name('send.verify.code');
        Route::post('verify/email', 'emailVerification')->name('verify.email');
        Route::post('verify/mobile', 'mobileVerification')->name('verify.mobile');
        Route::post('verify/g2fa', 'g2faVerification')->name('go2fa.verify');
    });

    Route::middleware(['check.status'])->group(function () {

        Route::get('user/data', 'User\UserController@userData')->name('data');
        Route::post('user/data/submit', 'User\UserController@userDataSubmit')->name('data.submit');

        Route::middleware('registration.complete')->namespace('User')->group(function () {

            Route::controller('UserController')->group(function(){
                Route::get('dashboard', 'home')->name('home');

                //2FA
                Route::get('twofactor', 'show2faForm')->name('twofactor');
                Route::post('twofactor/enable', 'create2fa')->name('twofactor.enable');
                Route::post('twofactor/disable', 'disable2fa')->name('twofactor.disable');

                //Report
                Route::any('fund/history', 'fundHistory')->name('deposit.history');
                Route::get('fund/search','fundSearch')->name('deposit.search');
                Route::get('transactions','transactions')->name('transactions');

                Route::get('attachment-download/{fil_hash}','attachmentDownload')->name('attachment.download');
            });

//          user Course list
            Route::controller('CourseController')->name('course.')->prefix('course')->group(function (){
               Route::get('/list','list')->name('list');
               Route::get('/create','create')->name('create');
               Route::post('/store','store')->name('store');
               Route::get('/edit/{courseId}','edit')->name('edit');
               Route::post('/update/{couserId}','update')->name('update');
               Route::get('/episode/list/{category_id}','episodeList')->name('episode.list');
               Route::post('/episode/edit','episodeEdit')->name('episode.edit');
               Route::get('/episode/details/{category_id}/{ep_id}', 'details')->name('episode.details');

            });

            Route::controller('EpisodeController')->name('episode.')->prefix('episode')->group(function(){
                Route::get('/list/{course_id}','list')->name('list');
                Route::get('/create/{course_id}','create')->name('create');
                Route::post('/store','store')->name('store');
                Route::get('/details/{id}','details')->name('details');
            });
            Route::get('/rating',[RatingController::class,'rating'])->name('rating');

            //Profile setting
            Route::controller('ProfileController')->group(function(){
                Route::get('profile/setting', 'profile')->name('profile.setting');
                Route::post('profile/setting', 'submitProfile');
                Route::get('change-password', 'changePassword')->name('change.password');
                Route::post('change-password', 'submitPassword');
            });


            // Withdraw
            Route::controller('WithdrawController')->prefix('payout')->name('withdraw')->group(function(){
                Route::get('/', 'withdrawMoney');
                Route::post('/', 'withdrawStore')->name('.money');
                Route::get('pre-release', 'withdrawPreview')->name('.preview');
                Route::post('pre-release', 'withdrawSubmit')->name('.submit');
                Route::get('history', 'withdrawLog')->name('.history');
                Route::get('search','search')->name('.search');
            });
        });

        // Payment
        Route::middleware('registration.complete')->controller('Gateway\PaymentController')->group(function(){
            Route::any('/fund', 'deposit')->name('deposit');
            Route::any('/payment/{amount}/{courseId}','payment')->name('payment');
            Route::post('fund/insert', 'depositInsert')->name('deposit.insert');
            Route::get('fund/confirm', 'depositConfirm')->name('deposit.confirm');
            Route::get('fund/manual', 'manualDepositConfirm')->name('deposit.manual.confirm');
            Route::post('fund/manual', 'manualDepositUpdate')->name('deposit.manual.update');

        });

    });
});
