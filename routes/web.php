<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\RegistrovanyUzivatelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZakaznikController;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Http\Controllers\SamozberController;
use App\Http\Controllers\RegisteredController;


Route::get('/',[HomeController::class, 'index'])->name('index');

// routes/web.php
Route::get('/register',[HomeController::class, 'register']);

Route::get('/log_in',[HomeController::class, 'login']);

//Route::post('/registrovany_uzivatel', [UserController::class, 'store'])->name('registrovany_uzivatel.store');

Route::post('/register', [UserController::class, 'store'])->name('register');

// Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile/edit', [LoginController::class, 'editProfile'])->name('editProfile')->middleware('auth');

Route::post('/profile/update', [LoginController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/edit', [UserController::class, 'edit'])->name('edit');

Route::post('/edit', [UserController::class, 'update'])->name('update');

// this will ensure that only "logged in users" can make samozbery   

Route::get('/samozber/create', [SamozberController::class, 'create'])->name('samozber.create');

Route::post('/samozber', [SamozberController::class, 'store'])->name('samozber.store');

Route::get('/samozber', [SamozberController::class, 'index'])->name('samozber.index');

Route::post('/samozber/add/{id}', [SamozberController::class, 'register'])->name('samozber.register');

// registrovane routy

Route::get('/suggestions/create', [RegisteredController::class, 'create'])->name('suggestions.create');

Route::post('/suggestions', [RegisteredController::class, 'store'])->name('suggestions.store');

// Moderator routy
Route::get('/moderator', [ModeratorController::class, 'moderator'])->name('moderator');

Route::get('/moderator/kategorie', [ModeratorController::class, 'moderator_kategorie'])->name('moderator_kategorie');

Route::get('/moderator/navrhy', [ModeratorController::class, 'moderator_navrhy'])->name('moderator_navrhy');

// kategorie veci
Route::get('/moderator/kategorie/{id}/detail', [ModeratorController::class, 'show_kategorie_detail'])->name('show_kategorie_detail');

Route::post('/kategoria/{id}/pridat-atribut', [ModeratorController::class, 'add_atribut'])->name('add_atribut');

Route::delete('/kategoria/{id}/zmazat-atribut/{atributId}', [ModeratorController::class, 'delete_atribut'])->name('delete_atribut');

Route::delete('/moderator/kategorie/ovocie/{id}', [ModeratorController::class, 'delete_kategoria'])->name('delete_kategoria');

// navrhy veci
Route::get('/moderator/navrhy/{id}/detail', [ModeratorController::class, 'show_navrhy_detail'])->name('show_navrhy_detail');

Route::get('/moderator/navrhy/{id}/detail', [ModeratorController::class, 'show_navrh_detail'])->name('show_navrh_detail');

Route::delete('moderator//navrhy/{id}/odmietnut', [ModeratorController::class, 'navrh_odmietnut'])->name('navrh_odmietnut');

Route::post('moderator/navrhy/{id}/schvalit', [ModeratorController::class, 'navrh_schvalit'])->name('navrh_schvalit');



// Admin routy
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::get('/admin/users', [AdminController::class, 'show_users'])->name('show_users');

Route::get('/admin/modarators', [AdminController::class, 'show_moderators'])->name('show_moderators');

    //delete
Route::delete('/admin/users/{id}', [UserController::class, 'delete_user'])->name('delete_user');

Route::delete('/admin/moderators/{id}', [UserController::class, 'delete_moderator'])->name('delete_moderator');
    // add moderator
        
Route::post('/admin/moderators', [UserController::class, 'store_moderator'])->name('store_moderator');


// Uzivatel routa
Route::get('/user', [RegistrovanyUzivatelController::class, 'user'])->name('user');

Route::get('/user/navrh_kategorie', [RegistrovanyUzivatelController::class, 'navrhnut_kategoriu'])->name('navrhnut_kategoriu');

Route::get('/user/vlozit_nabidku', [RegistrovanyUzivatelController::class, 'vlozit_nabidku'])->name('vlozit_nabidku');

Route::get('/user/prechadzat_nabidky', [ZakaznikController::class, 'prechadzat_nabidky'])->name('prechadzat_nabidky');