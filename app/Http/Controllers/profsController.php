<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\profs; // wrong
use App\Models\Profs;

class profsController extends Controller
{
    public function ajoute(){

   return view('profsajoute');

    }

    public function store(Request $request){
       
       $data = new profs();
       $data -> nom = $request->nom;
       $data -> prenom = $request->prenom;
       $data -> email = $request->email;
       $data -> specialite = $request->specialite;
       $data -> cin = $request->cin;
       $data -> adresse = $request->adresse;
       $data -> date_Naissance = $request->date_naissance;
       $data -> tel = $request->tel;  
       $data -> experience = $request->experience; 
       $data->save();

       $notification = array(
           'message'=>'Insertion avec succées!',
           'alert-type'=>'success'
       );
       return redirect()->route('view.profs')->with($notification);
      
    }

    
    public function view(){

        $allData = profs::all();
        return view('profs-view',compact('allData'));
    }
    
    public function delete($id){
        
        profs::find($id)->delete();

      
          
            $notification = array(
                'message'=>'Suppression avec succées!',
                'alert-type'=>'warning'
           
            );
            return back()->with($notification);

    }

    public function edit( $id){

        $editData = profs::where('id',$id)->first();
        return view('profsajoute', compact('editData'));

    }


    public function update( Request $request ,$id){

       $data = profs::where ('id',$id)->first();
       $data->nom=$request->nom;
       $data->prenom=$request->prenom;
       $data->email=$request->email;
       $data->specialite=$request->specialite;
       $data->cin=$request->cin;
       $data->adresse=$request->adresse;
       $data->date_naissance=$request->date_naissance;
       $data->tel=$request->tel;
       $data->save();

       $notification = array(
        'message'=>'mis à jour avec succés!',
        'alert-type'=>'success'
    );
    return redirect()->route('view.profs')->with($notification);



    }
    
    
    


} 


// now try to run your code and see if there is any error