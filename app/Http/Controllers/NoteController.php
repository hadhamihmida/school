<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\note;
use App\Models\Annee;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();

        return view('notes.index',compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'notes.*.note' => 'required',
            'notes.*.eleve_id' => 'required',
            'examen_id'=> 'required',
            'notes.*.remarque' => 'required',
           
           
        ]);
        //dd($request->input('notes'));
        foreach ($request->input('notes') as $key => $value) {
            note::create([
                'examen_id'=>$request->input('examen_id'),
                'eleve_id'=>$value['eleve_id'],
                'note'=>$value['note'],
                'remarque'=>$value['remarque'],
            ]);
        }
     
   
        return redirect()->route('note.index')
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
