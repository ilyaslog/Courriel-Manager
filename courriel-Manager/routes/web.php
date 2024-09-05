<?php

use App\Models\User;
use App\Models\Urgence;
use App\Models\Categorie;
use App\Models\Importance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courriels\UrgenceController;
use App\Http\Controllers\Courriels\CategorieController;
use App\Http\Controllers\Courriels\ImportanceController;
use App\Http\Controllers\Courriels\CourrielController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})
    ->name('welcome')
    ->middleware('auth');

Route::get('/User/dashboard', function () {
    return view('User.Dashboard');
})->name('dashboard');

Route::get('/Courrier', function () {
    $user = User::all();
    $urgences = Urgence::all();
    $importances = Importance::all();
    $categories = Categorie::all();
    return view('Courrier', [
        'users' => $user,
        'urgences' => $urgences,
        'importances' => $importances,
        'categories' => $categories,
    ]);
})->name('Courrier');

Route::get('/ParametrageCourrier', function () {
    $urgences = [''];
    $categories = [''];
    $importances = [''];
    $urgences = Urgence::all();
    $importances = Importance::all();
    $categories = Categorie::all();
    return view('ParametrageCourrier', [
        'urgences' => $urgences,
        'importances' => $importances,
        'categories' => $categories,
    ]);
})->name('ParametrageCourrier');

Route::post('/urgences/store', [UrgenceController::class, 'store'])->name('urgences.store');
Route::post('/importances/store', [ImportanceController::class, 'store'])->name('importances.store');
Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories.store');

Route::delete('/importances/{importance?}', [ImportanceController::class, 'destroy'])->name('importances.destroy');
Route::delete('/urgences/{urgence?}', [UrgenceController::class, 'destroy'])->name('urgences.destroy');
Route::delete('/categories/{categorie?}', [CategorieController::class, 'destroy'])->name('categories.destroy');

Route::prefix('/User/CourrielsUser')->group(function () {
    Route::get('/', [CourrielController::class, 'index'])->name('CourrielsUser');
    Route::post('/', [CourrielController::class, 'store2'])->name('courriels.store2');
});

Route::get('/create-courrier', [CourrielController::class, 'store'])->name('courrier.store');

Route::post('/courriels', [CourrielController::class, 'store'])->name('courriels.store');

Route::prefix('courriels')->group(function () {
    Route::get('/', [CourrielController::class, 'index'])->name('courriels.index');
    Route::post('/', [CourrielController::class, 'store'])->name('courriels.store');
});


Route::get('/Ajouter-User', function () {
    return view('Ajouter_User');
})->name('Ajouter_User');


Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/List-User', function () {
    $users = User::all();
    return view('List-Users', [
        'users' => $users,
    ]);
})->name('List_User');


Route::get('/courriel/{id}', [CourrielController::class, 'show'])->name('courriel.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/courriel/{id}', [CourrielController::class, 'show'])->name('courriel.show');

Route::get('/User/SentMails', [CourrielController::class, 'indexSent'])->name('SentMails');

Route::get('/courrielSent/{id}', [CourrielController::class, 'showSent'])->name('courrielSent.show');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::get('/Profile', function () {
    return view('Profile');
})->name('Profile');

Route::put('/users/{id}/aboutme', [UserController::class, 'updateAboutMe'])->name('Update_AboutMe');

Route::get('/Profile-User', function () {
    return view('User.Profile-User');
})->name('Profile-User');

Route::put('/users/{id}/aboutmeUser', [UserController::class, 'updateAboutMeUser'])->name('updateAboutMeUser');

Auth::routes();
