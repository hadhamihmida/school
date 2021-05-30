<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Illuminate\Contracts\Validation\Rule;
 use App\Models\Profs;
 use App\Models\Matieres;
 use Validator;

class profsController extends Controller
{
    public function ajoute(){
 
     $matieres = Matieres::all();  
   return view('profsajoute',compact('matieres'));

    }

    public function store(Request $request){
//dd($request->all());
      // $data = new profs();
      // $data -> nom = $request->nom;
       //$data -> prenom = $request->prenom;
       //$data -> email = $request->email;
       //$data -> cin = $request->cin;
       //$data -> adresse = $request->adresse;
       //$data -> date_Naissance = $request->date_naissance;
       //$data -> tel = $request->tel;  
       //$data -> experience = $request->experience; 
       //$data -> matiere_id = $request->matiere_id;
       
       //$data->save();
       $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => ['required','string','max:255', 'unique:profs'],
        'cin' => ['required','int','max:9','unique:profs'],
        'adresse' => 'required',
        'date_naissance' => 'required',
        'tel' => 'required',
        'experience' => 'required',
        'matiere_id' => 'required',
        
    ]);
    public function getMessages(){
        return $messages =[
            'nom.required'=>'tapez nom',
            'prenom.required'=>'tapez prenom',
            'email.required'=>'tapez email',
            'cin.required' =>'tapez cin',
            'adresse.required' => 'taper adresse',
            'date_naissance.required'=>'tapez date de naissance',
            'tel.required'=>'tapez le numero de tel',
            'experience.required'=>'tapez les annees des experiences',
            'matiere_id.required'=>'tapez le matiere',
        ];
    }



   //Matieres
   Profs::create($request->all());

       $notification = array(
           'message'=>'Insertion avec succées!',
           'alert-type'=>'success'
       );
       return redirect()->route('view.profs')->with($notification);
      
    }

    
    public function view(){

        $allData = Profs::all()->load('matiere');
        return view('profs-view',compact('allData'));
    }
    
    public function delete($id){
        
        Profs::find($id)->delete();

      
          
            $notification = array(
                'message'=>'Suppression avec succées!',
                'alert-type'=>'warning'
           
            );
            return back()->with($notification);

    }

    public function edit( $id){
        $matieres = Matieres::all();
        $editData = Profs::where('id',$id)->first();
        return view('profsajoute', compact('editData','matieres'));

    }

//$id//
    public function update( Request $request ,Profs $profs){

       //$data = profs::where ('id',$id)->first();
       //$data->nom=$request->nom;
       //$data->prenom=$request->prenom;
       //$data->email=$request->email;
       //$data->cin=$request->cin;
       //$data->adresse=$request->adresse;
       //$data->date_naissance=$request->date_naissance;
       //$data->tel=$request->tel;
       //$data ->matiere_id =$request->matiere_id;
       //$data->save();
       $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'cin' => 'required',
        'adresse' => 'required',
        'date_naissance' => 'required',
        'tel' => 'required',
        'experience' => 'required',
        'matiere_id' => 'required',
        
    ]);
    $profs->update($request->all());

       $notification = array(
        'message'=>'mis à jour avec succés!',
        'alert-type'=>'success'
     );
       return redirect()->route('view.profs')->with($notification);
    } 

    public function destroy($id)
    {
         
        $profs = Profs::findOrFail($id);
        //foreach($profs->seance as $seance){
           // $seance->delete();
        //}
        //foreach($profs->matieres as $matiere){
          //  $matiere->delete();
       // }
        //foreach($profs->absents as $absent){
           // $absent->delete();
       // }
        $profs->delete();
     
        return redirect()->route('view.profs')->with('completed', 'profs suprimer!!');
    }
     

} 

 