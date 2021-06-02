<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Annee;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $matiere = Matieres::all()->load('annee');
        return view('matiere.index', compact('matiere'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $annees = Annee::all();
            return view('matiere.create',compact('annees'));
            
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
            'nom' => 'required|max:20',
            'nombre' => 'required|numeric',
            'annee_id'=> 'required',
        ]);
        
       Matieres::create($request->all());
   
        return redirect()->route('matiere.index')
                        ->with('success','matieres creer avec succeés.');
      
    
    // if($request->fails())  {
       // return redirect()->back()->withErrors($request)->withInputs($request->all());   
       // }
    }
       public function getMessages(){
           return $messages =[
        'nom.reqired'=>'entrer le nom',
        'nombre.required' =>'entrer le nombre',
        'annee_id.required' =>'selectionner annees',
           ];
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
         $annees = Annee::all();
        return view('matiere.edit', compact('matiere','annees'));
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
        'nombre' => 'required',
        'annee_id' => 'required',
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
