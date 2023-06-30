<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;



$controller_path = 'App\Http\Controllers';

// Routes non authentifiées
Route::get('/auth/login-basic', $controller_path . '\Authentications\LoginBasic@index')->name('login');
Route::post('/auth/login-basic', $controller_path . '\Authentications\LoginBasic@login')->name('login-post');

// authentication
Route::get('/auth/register-basic', $controller_path . '\Authentications\RegisterBasic@register')->name('register-post');
Route::get('/auth/forgot-password-basic', $controller_path . '\Authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// Page d'accueil
Route::redirect('/', '/auth/login-basic'); // Redirige vers la page de connexion

// Routes authentifiées (requièrent une authentification préalable)
Route::middleware('auth')->group(function () {
    // Ajoutez ici les autres routes nécessitant une authentification
    $controller_path = 'App\Http\Controllers';

    // Page d'accueil
    Route::get('/dashboard', function () {
        return view('content.dashboard.dashboards-analytics');
    })->name('dashboard-analytics');



    // Logout
    Route::get('/auth/logout', $controller_path . '\Authentications\LoginBasic@logout')->name('logout');

    // Get Username
      Route::get('/auth/get-username', $controller_path . '\Authentications\LoginBasic@getUsername')->name('get-username');

    // Routes pour la gestion des offres, des niveaux, des types d'offres, des domaines, des applications, des stages, des rôles et des posts
    Route::resource('offers', $controller_path . '\Admin\OfferController');
    Route::get('offers/status/{id}/{status}',$controller_path . '\Admin\OfferController@status')->name('offers.status');



    Route::resource('levels', $controller_path . '\Admin\LevelController');
    Route::resource('type-offers', $controller_path . '\Admin\TypeOfferController');
    Route::resource('domains', $controller_path . '\Admin\DomainController');
    Route::resource('applications', $controller_path . '\Admin\ApplicationController');
    Route::resource('internships', $controller_path . '\Admin\InternshipController');
    Route::resource('roles', $controller_path . '\Admin\RoleController');
    Route::resource('permissions', $controller_path . '\Admin\PermissionController');
    Route::resource('users', $controller_path . '\Admin\UserController');
    Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
    Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
    Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
    Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
    Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');
});

