<?php

namespace App\Http\Controllers;

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
        $seance = Seance::all()->load(['prof','classe.annee']);
        return view('seance.index', compact('seance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Annees = Annee::all();
        $profs= Profs::all();
        return view('seance.create',compact('profs','Annees'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seances   $seance)
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
       $Annees = Annee::all();
        $seance = Seance::findOrFail($id);
        return view('seance.edit', compact('seance','profs','Annees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,   Seances $seance)
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
        $seance = Seances::findOrFail($id);
        $seance->delete();

        return redirect('/seance')->with('completed', 'seance suprimer!!');
     
    }
}
