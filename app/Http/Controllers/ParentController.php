<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Parents; // why use this, there is no Parents model. it is wrong
use App\Models\parents; // right

class ParentController extends Controller{



    public function ajoute(){

        return view('Parentsajoute');
    }
     
         
     
         public function store(Request $request){

            $request->validate([
                'nom_pr' => 'required',
                'prenom_pr' => 'required',
                'email' => 'required',
                'adresse' => 'required',
                'cin' => 'required',
                'tel' => 'required',
                'nomber' => 'required',


            ]);
            // $data = new Parents();
            // $data -> nom_pr = $request->nom_pr;
            // $data -> prenom_pr = $request->prenom_pr;
             //$data -> email = $request->email;
            // $data -> cin = $request->cin;
            // $data -> tel = $request->tel;
            // $data -> nombre = $request->nombre;  
            // $data->save();
            Parents::create($request->all());
     
            $notification = array(
                'message'=>'Insertion avec succées!',
                'alert-type'=>'success'
            );
            return redirect()->route('view.Parent')->with($notification);
           
         }
     
         
         public function view(){
     
             $allData = Parents::all();
             return view('Parents-view',compact('allData'));
         }
         
         public function delete($id){
             
             Parents::find($id)->delete();
     
           
               
                 $notification = array(
                     'message'=>'Suppression avec succées!',
                     'alert-type'=>'warning'
                
                 );
                 return back()->with($notification);
     
            }
     
         public function edit( $id){
     
             $editData = Parents::where('id',$id)->first();
             return view('Parentsajoute', compact('editData'));
     
         }
     
     
         public function update( Request $request ,$id){
     
            $data = Parents::where ('id',$id)->first();
            $data -> nom_pr = $request->nom_pr;
            $data -> prenom_pr = $request->prenom_pr;
            $data -> email = $request->email;
            $data -> nom_el = $request->nom_el;
            $data -> prenom_el = $request->prenom_el;
            $data -> cin = $request->cin;
            $data -> tel = $request->tel;
            $data -> nombre = $request->nombre; 
            $data->save();
     
            $notification = array(
             'message'=>'mis à jour avec succés!',
             'alert-type'=>'success'
         );
         return redirect()->route('view.Parent')->with($notification);
     
     
     
         }
         

}

