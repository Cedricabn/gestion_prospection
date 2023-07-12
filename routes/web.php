<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExempleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ProspectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/test', function () {
    return view('edit');
});


Route::get('/dash',[ Controller::class, "index"])->name("dash");


Route::resource('exemple', ExempleController::class);



Route::get('/nosprospections',[ProspectController::class, 'guestprospection'])->name('nosprospections');


Route::get('/welcome', [UserController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return redirect()->route('dash');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/ListedesProspects',[ ProspectController::class, "listeprospects"])->name("Listeprospects");
    Route::get('/ListedesProspectsok',[ ProspectController::class, "listeprospectsok"])->name("Listeprospectsok");
    Route::get('/ListedesProspectsnook',[ ProspectController::class, "listeprospectsnook"])->name("Listeprospectsnook");

    Route::get( "/create",[ProspectController::class ,"create"])->name("create");
    Route::post("/creation",[ProspectController::class ,"store"])->name("prospect.ajouter");
    Route::delete("/SuppressionProspect/{prospect}",[ProspectController::class ,"delete"])->name("prospect.supprimer");
    Route::put("/EditiondesProspects/{prospect}",[ProspectController::class ,"editer"])->name("prospect.editer");
    Route::get("/EditiondesProspects/edit/{prospect}",[ProspectController::class ,"edit"])->name("prospect.edit");
    
    Route::get('/ListedesUtilisateurs',[ UserController::class, "listeusers"])->name("Listeusers");
    Route::get('/ListedesAgents',[ UserController::class, "listeagents"])->name("Listeagents");
    Route::get('/ListedesInvités',[ UserController::class, "listeguests"])->name("Listeguests");
    Route::put("/Editiondesutilisateurs/{user}",[UserController::class ,"editer"])->name("user.editer");


    Route::get('/rapports', [RapportController::class, 'index'])->name('rapports');
    Route::get('/rapports/filtrer', [RapportController::class, 'filtrerRapports'])->name('filtrerRapports');
    Route::get('/rapports/exporter', [RapportController::class, 'exporterRapports'])->name('exporterRapports');
    
});

require __DIR__.'/auth.php';
