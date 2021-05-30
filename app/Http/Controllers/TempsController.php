<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Seance;

class TempsController extends Controller
{
  public function index(){
      $annees = Annee::all();

      return view('emplois.temps',compact('annees'));
  }
  public function temps(Classe $classe){
    $classe=$classe->load(['seances.prof.matiere','seances.classe.annee']);
    
    return response()->json($classe->seances);
  }
  public function temps2(Seance $seance){
    $seance=$seance->load(['prof.matiere']);
    return view('Absent.absentprof',compact('seance'));
  }
}
