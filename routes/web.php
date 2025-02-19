<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\FormateurController;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Livewire\DashboardAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        if($request->user()->role->name=="Admin"){
            return redirect()->route("admin.dashboard");
        }
         if($request->user()->role->name=="Formateur"){
                       return redirect()->route("formateur.dashboard");

        }
         if($request->user()->role->name=="Apprenant"){
                            return redirect()->route("apprenant.dashboard");

        }
       
    })->name('dashboard');

Route::middleware("role:Apprenant")->group(function(){
Route::get("/apprenant/dashboard",[ApprenantController::class,"index"])->name("apprenant.dashboard")->middleware("role:Apprenant");
Route::post("/formations/{formation}/join",[FormationController::class,"join"])->name("formation.join");});
Route::get('/admin/dashboard', DashboardAdmin::class)->name('admin.dashboard')->middleware('role:Admin');
Route::get("/formateur/dashboard",[FormateurController::class,"index"])->name("formateur.dashboard")->middleware("role:Formateur");
   
});
