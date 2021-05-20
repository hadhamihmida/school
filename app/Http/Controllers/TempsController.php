<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\Classe;

class TempsController extends Controller
{
  public function index(){
      $annees = Annee::all();
      return view('emplois.temps',compact('annees'));
  }
  public function temps(Classe $classe){
    $classe=$classe->load('seances.prof.matiere');
      return response()->json($classe->seances);
  }
}
