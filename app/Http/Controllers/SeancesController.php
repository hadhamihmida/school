<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Profs;
use App\Models\Annee;
use App\Models\Classe;

class SeancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seances = Seance::all()->load(['prof','classe.annee','matiere'])
        ->each(function ($item, $key) {
                    $semaine=[
                        1=>'Lundi',
                        2=>'Mardi',
                        3=>'Merecredi',
                        4=>'Jeudi',
                        5=>'Vendredi',
                        6=>'Samedi',
                    ];
                    $item->jour= $semaine[ $item->jour];
                });
    //dd($seances);
    $seances=Seance::paginate('4');
        return view('seance.index', compact('seances'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Annees = Annee::all();
        $matieres = Matieres::all()->load('annee');
        $profs= Profs::all();
        return view('seance.create',compact('profs','Annees','matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'jour'=> 'required',
            'classe_id'=> 'required',
            'profs_id'=> 'required',
        ]);

       Seance::create($request->all());

        return redirect()->route('seance.index')
                        ->with('success','seances creer avec succeés.');
    }
    public function getMessages(){
        return $messages =[
            'heure_debut.required'=>'tapez le debut de seance',
            'heure_fin.required'=>'tapez le fin de seances',
            'jour.required'=>'tapez le jour de sceances',
            'classe_id.required'=>'tapez la classe',
            'prof_id.required'=>'tapez le profeseur',

        ];
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seance   $seance)
    {
        return view('seance.show',compact('seance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profs = Profs::all();
        $matieres = Matieres::all()->load('annee');
        $Annees = Annee::all();
        $seance = Seance::findOrFail($id);
        return view('seance.edit', compact('seance','profs','Annees','matieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,   Seance $seance)
    {
        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'jour'=> 'required',
            'classe_id'=> 'required',
            'profs_id'=> 'required',
        ]);

        $seance->update($request->all());

        return redirect()->route('seance.index')
                        ->with('success','seances updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->delete();

        return redirect('/seance')->with('completed', 'seance suprimer!!');

    }
}
