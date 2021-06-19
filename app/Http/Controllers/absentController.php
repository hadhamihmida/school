<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\Seance;
use App\Models\profabsents; 


class absentController extends Controller
{
    public function index(){
        $annees = Annee::all();
        return view('emplois.temps',compact('annees'));

    }
    public function temps(Seance $seance){
        $seance=$seance->load(['prof.matiere']);
           return view('Absent.absentprof');
    }

    public function create(Request $request,Seance $seance){
       // dd($request->all());
        $request->validate([
            'status'=>'required',
            'date'=>'required'
        ]);
        profabsents::create($request->all());
        return redirect()->route('temps.index');
    }

    public function show( profabsents $profabsent)
    {
        return view('Absent.editprof',compact('profabsent'));
    }
   // all()->load
   public function absents(){
    $absents = profabsents::with(['seance','prof','matiere'])->paginate(3);
    return view('Absent.index',compact('absents'));

 }
 public function edit($id)
    {
         $absent = profabsents::findOrFail($id);
        return view('absent.edit', compact('absent'));
    }
    public function destroy($id)
    {
         
        $absent = profabsents::findOrFail($id);
        $absent->delete();
       
        return redirect()->route('profsabsents')->with('completed', 'matiere suprimer!!');
    }
     
    public function update(Request $request, profabsents $absent)
    {
         $request->validate([
        'nom' => 'required',
        'matiere' => 'required',
        'date' => 'required',
    ]);

    $absent->update($request->all());

    return redirect()->route('profsabsents')
                    ->with('success','absent updated successfully');
       
 
 
    }


}
