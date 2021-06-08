<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $annees = Annee::paginate(3);
       // $annees  = array('1' => 'one', '2' => 'two' );
        return view('annee.index', compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annee.create');
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
           
        ]);
      
       Annee::create($request->all());
   
        return redirect()->route('annee.index')
                        ->with('success','annee creer avec succeés.');
    }

    public function getMessages(){
         return $messages=[
             'nom.required'=>'tapez nom',
         ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('annee.show',compact('annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annee = Annee::findOrFail($id);
        return view('annee.edit', compact('annee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Annee $annee)
    {
        $request->validate([
            'nom' => 'required',
        ]);
    
        $annee->update($request->all());
    
        return redirect()->route('annee.index')
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
         
        $annee = Annee::findOrFail($id);
        $annee->delete();

        return redirect('/annee')->with('completed', 'annee suprimer!!');
    }


    public function classes(Annee $annee)
    {
        return response()->json($annee->classes);
    }

    public function matieres(Annee $annee)
    {
        return response()->json($annee->matieres);
    }
   
}
