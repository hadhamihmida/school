<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Annee;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe = Classe::all()->load('annee');
        
        return view('classe.index', compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annees = Annee::all();
        return view('classe.create',compact('annees'));
        
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
            'capaciter' => 'required',
            'numérotation' => 'required',
            'annee_id' => 'required',
            
        ]);

       Classe::create($request->all());
   
        return redirect()->route('classe.index')
                        ->with('success','Classe creer avec succeés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        return view('classe.show',compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        $annees =Annee::all();
        return view('classe.edit', compact('classe','annees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'capaciter' => 'required',
            'numérotation' => 'required',
            'annee_id' => 'required',
        ]);

        $classe->update($request->all());

        return redirect()->route('classe.index')
                        ->with('success','classe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect('/classe')->with('completed', 'classe suprimer!!');
    }
    
}
