<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\MatiereController;
// you didnot add calender class here
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\AnneeController;
/*

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Professeures
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('profs')->group(function(){
    Route::get('/view',[profsController::class,'view'])->name('view.profs');
    Route::get('/ajoute',[profsController::class,'ajoute'])->name('ajoute.profs');
    Route::get('/store',[profsController::class,'store'])->name('store.profs');
    Route::get('update/{id}',[profsController::class,'update'])->name('update.profs');
    Route::get('delete/{id}',[profsController::class,'delete'])->name('delete.profs');
    Route::get('edit/{id}',[profsController::class,'edit'])->name('edit.profs');
    });
    //élèves
    Route::prefix('elevess')->group(function(){

        Route::get('eleves',function(){
            return view('eleves');
        })->name('eleves');
        Route::get('eleve',[StudentController::class, 'eleve'])->name('eleve.Student');
        Route::post('store',[StudentController::class, 'store'])->name('store.Student');
        Route::post('update/{eleve}',[StudentController::class, 'update'])->name('update.Student');
        Route::get('ajoute',[StudentController::class, 'ajoute'])->name('ajoute.Student');
        Route::get('delete/{id}',[StudentController::class,'delete'])->name('delete.Student');
        Route::get('edit/{id}',[StudentController::class, 'edit'])->name('edit.Student');
    });
    
    //parents
    Route::prefix('Parents')->group(function(){
        Route::get('/view',[ParentController::class,'view'])->name('view.Parent');
        Route::get('/ajoute',[ParentController::class,'ajoute'])->name('ajoute.Parent');
        Route::post('/store',[ParentController::class,'store'])->name('store.Parent');
        Route::post('update/{parent}',[ParentController::class,'update'])->name('update.Parent');
        Route::get('delete/{id}',[ParentController::class,'delete'])->name('delete.Parent');
        Route::get('edit/{id}',[ParentController::class,'edit'])->name('edit.Parent');
        });
        //matiéres
        Route::resource('/matiere', MatiereController::class);
        //classe
        Route::resource('/classe', ClasseController::class);
       //Annee
       Route::resource('/annee', AnneeController::class);
       Route::get('annee/{annee}/classes',[AnneeController::class,'classes'])->name('annee.classes');

     //calendreier
     Route::get('fullcalender', [FullCalenderController::class, 'index']);
     Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
         


    // this is just for demo purpose
    // Route::get('sample',[elevessController::class, 'demo'])->name('demo.sample');

    // try school.test/sample, it should show sample.blade.php
