<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\TempsController;
use App\Http\Controllers\absentController;
use App\Http\Controllers\AbsenteleveController;
use App\Http\Controllers\ExamensController;
use App\Http\Controllers\NoteController;
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
    return redirect()->route('login');
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
    Route::get('destroy/{id}',[profsController::class,'destroy'])->name('destroy.profs');
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
        Route::get('destroy/{id}',[StudentController::class,'destroy'])->name('destroy.Student');
    });

    //parents
    Route::prefix('Parents')->group(function(){
        Route::get('/view',[ParentController::class,'view'])->name('view.Parent');
        Route::get('/ajoute',[ParentController::class,'ajoute'])->name('ajoute.Parent');
        Route::post('/store',[ParentController::class,'store'])->name('store.Parent');
        Route::post('update/{parent}',[ParentController::class,'update'])->name('update.Parent');
        Route::get('delete/{id}',[ParentController::class,'delete'])->name('delete.Parent');
        Route::get('edit/{id}',[ParentController::class,'edit'])->name('edit.Parent');
        Route::get('destroy/{id}',[ParentController::class,'destroy'])->name('destroy.Parent');
        });
    //matiéres
        Route::resource('/matiere', MatiereController::class);
        Route::get('annee/{annee}/matieres', [AnneeController::class,'matieres']);

        //classe
        Route::resource('/classe', ClasseController::class);


       //Annee
       Route::resource('/annee', AnneeController::class);
       Route::get('annee/{annee}/classes',[AnneeController::class,'classes'])->name('annee.classes');

//seance
      Route::resource('/seance', SeancesController::class);
//temps
     Route::get('temps',[TempsController::class,'index'])->name('temps.index');
     Route::get('temps/{classe}',[TempsController::class,'temps']);
//teachersabsents
    Route::get('absent_prof/{seance}',[TempsController::class,'temps2']);
    Route::post('absent_prof/{seance}/create',[absentController::class,'create'])->name('absent_prof.create');
   Route::get('absent_profs',[absentController::class,'absents'])->name('profsabsents');
   Route::get('edit/{id}',[absentController::class,'edit'])->name('absent.edit');
   Route::delete('absent_prof/{seance}/destroy',[absentController::class,'destroy'])->name('absent.destroy');
   Route::patch('update/{id}',[absentController::class,'update'])->name('absent.update');
   //absenteleve
   Route::get('absentstudent',[AbsenteleveController::class,'index'])->name('absentstudent.index');
   Route::get('classe/{classe}/eleves',[ClasseController::class,'eleves'])->name('classe.eleves');
   Route::get('classe/{classe}/examens',[ClasseController::class,'examens'])->name('classe.examens');
 //examen
   Route::resource('/examen', ExamensController::class);
   //note
   Route::resource('note',NoteController::class);
