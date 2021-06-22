<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\exman;
use App\Models\Matieres;

class ExamensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $examens = exman::all()->load('matiere','classe.annee');
        //dd($examens);
        return view('examen.index', compact('examens'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annees = Annee::all();

        return view('examen.create',compact('annees'));
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
            'date' => 'required',
            'matiere_id' => 'required',
            'classe_id'=> 'required',
           'semseter'=>'required'
        ]);

       exman::create($request->all());

        return redirect()->route('examen.index')
                        ->with('success','examen date creer avec succeés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = exman::findOrFail($id)->load(['classe.annee','matiere']);
        $annees = Annee::all();
       return view('examen.edit', compact('examen','annees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param exman $examen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'matiere_id' => 'required',
            'classe_id' => 'required',
            'semseter'=>'required',
        ]);

        exman::findOrFail($id)->update($request->all());

        return redirect()->route('examen.index')
                        ->with('success','examen updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examens = exman::findOrFail($id);
        $examens->delete();

        return redirect('/examen')->with('completed', 'examen suprimer!!');
    }
}
