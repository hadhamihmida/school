<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profs;
use App\Models\eleves;
use App\Models\Classe;
use App\Models\Annee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profs_count=Profs::all()->count();
        $eleves_count=eleves::all()->count();
        $Classe_count=Classe::all()->count();
        $Annee_count=Annee::all()->count();
        $annees= Annee::with('classes')->get();
        
        $classes_ids_per_annee= collect([]);
        $annes_nom=collect([]);
        foreach ($annees as $key => $value) {
            $classes_ids_per_annee->push($value->classes->pluck('id')->toArray());
            $annes_nom->push($value->nom);
        }
        $eleves_count_per_annee=collect([]);
        foreach ($classes_ids_per_annee as $key => $value) {
            if(count($value)>0){
                $eleves_count_per_annee->push(eleves::whereIn('classe_id',$value)->get()->count());
            }else{
                $eleves_count_per_annee->push(0);
            }
        }
        $bg_colors=['indigo','maroon','lightblue','orange','navy','lime'];
        
        // return response()->json($eleves_count_per_annee);
        return view('home',
            compact('profs_count',
                'eleves_count',
                'annes_nom',
                'eleves_count_per_annee',
                'Classe_count',
                'Annee_count',
                'bg_colors'
            )
        );
    }
}
