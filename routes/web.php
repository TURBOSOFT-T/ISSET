<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');
    
Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');    
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');    
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');    
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');    
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');    
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');    
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');    
}); 

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::prefix('authentication')->group(function () {
    Route::view('/login', 'authentication.login')->name('login');
    Route::view('sign-up', 'authentication.sign-up')->name('sign-up');
});
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/agents', [App\Http\Controllers\AgentController::class, 'index'])->name('agent');
Route::get('/agents/nouveau-agent', [App\Http\Controllers\AgentController::class, 'viewcreate'])->name('create');
Route::post('/agents/supprimer-agent', [App\Http\Controllers\AgentController::class, 'delete']);
Route::post('/agents/details', [App\Http\Controllers\AgentController::class, 'details']);
Route::post('/agents/modifier', [App\Http\Controllers\AgentController::class, 'modifier'])->name('modifier');
Route::post('/agents/enregistrer', [App\Http\Controllers\AgentController::class, 'register_agent'])->name('register_agent');


Route::get('/rapports', [App\Http\Controllers\RapportController::class, 'index'])->name('rapport');

Route::get('/dashboard', [App\Http\Controllers\RapportController::class, 'rapport_directeur'])->name('rapport.directeur');
Route::post('/dashboard', [App\Http\Controllers\RapportController::class, 'rapport_directeur'])->name('rapport.directeur');

Route::post('/export', [App\Http\Controllers\RapportController::class, 'rapport_export'])->name('rapport.export');

Route::get('/rapports/nouveau-agent', [App\Http\Controllers\RapportController::class, 'viewcreate'])->name('createrapport');
Route::post('/rapports/supprimer-rapport', [App\Http\Controllers\RapportController::class, 'delete']);
Route::post('/rapports/details', [App\Http\Controllers\RapportController::class, 'details']);
Route::post('/rapports/modifier', [App\Http\Controllers\RapportController::class, 'modifier'])->name('modifier.rapport');
Route::post('/rapports/enregistrer', [App\Http\Controllers\RapportController::class, 'register_rapport'])->name('register_rapport');


Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/users/enregistrer-utilisateur', [App\Http\Controllers\UserController::class, 'register_user'])->name('register_user');
Route::post('/users/modifier-utilisateur', [App\Http\Controllers\UserController::class, 'modifier'])->name('modifier.utilisateur');
Route::post('/users/details-utilisateur', [App\Http\Controllers\UserController::class, 'details']);
Route::get('/users/nouveau-utilisateur', [App\Http\Controllers\UserController::class, 'viewcreate'])->name('createuser');
Route::post('/users/supprimer-utilisateur', [App\Http\Controllers\UserController::class, 'delete']);


Route::get('/account', [App\Http\Controllers\UserController::class, 'compte'])->name('compte');
Route::post('/modifier-compte', [App\Http\Controllers\UserController::class, 'modifierCompte'])->name('modifier.compte');
