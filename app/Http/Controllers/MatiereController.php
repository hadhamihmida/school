<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matieres;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $matiere = Matieres::all();
        return view('matiere.index', compact('matiere'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('matiere.create');
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
            'nom' => 'required',
            'professeur' => 'required',
            'niveau' => 'required',
            'nombre' => 'required',
        ]);

       Matieres::create($request->all());
   
        return redirect()->route('matiere.index')
                        ->with('success','matieres creer avec succeés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Matieres $matiere)
    {
        return view('matiere.show',compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $matiere;
         $matiere = Matieres::findOrFail($id);
        return view('matiere.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matieres $matiere)
    {
         $request->validate([
        'nom' => 'required',
        'professeur' => 'required',
        'niveau' => 'required',
        'nombre' => 'required',
    ]);

    $matiere->update($request->all());

    return redirect()->route('matiere.index')
                    ->with('success','matires updated successfully');
       
 
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $matiere = Matieres::findOrFail($id);
        $matiere->delete();

        return redirect('/matiere')->with('completed', 'matiere suprimer!!');
    }
     
}
