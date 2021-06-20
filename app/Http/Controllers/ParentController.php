<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parents; 

class ParentController extends Controller{



    public function ajoute(){

        return view('Parentsajoute');
    }



    public function store(Request $request){
         $request->validate([
             'nom_pr'=>'required',
             'prenom_pr'=>'required',
             'email'=>'required',
             'tel'=>'required',
             'cin'=>'required',
             'adresse'=>'required',
             'nombre'=>'required',
         ]);
        // $data = new Parents();
        // $data -> nom_pr = $request->nom_pr;
        // $data -> prenom_pr = $request->prenom_pr;
         //$data -> email = $request->email;
        // $data -> cin = $request->cin;
        // $data -> tel = $request->tel;
        // $data -> nombre = $request->nombre;
        // $data->save();
        $parent=parents::create($request->all());
        $notification = array(
            'message'=>'Insertion avec succées!',
            'alert-type'=>'success'
        );
        return redirect()->route('view.Parent')->with($notification);

         }

         public function getMessages(){
             return $messages=[
                 'nom_pr.required'=>'tapez nom parent',
                 'prenom_pr.required'=>'tapez prenom de parent',
                 'email.required'=>'tapez email',
                 'cin.required'=>'tapez cin',
                 'tel.required'=>'tapez le numero de tel',
                 'nombre.required'=>'tapez le nombre',
             ];
         }


         public function view(){

             $allData = Parents::paginate(4);
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


         public function update( Request $request ,parents $parent){

             $request->validate([
                 'nom_pr'=>'required',
                 'prenom_pr'=>'required',
                 'email'=>'required',
                 'tel'=>'required',
                 'cin'=>'required',
                 'adresse'=>'required',
                 'nombre'=>'required',
             ]);
            $parent->update($request->all());

            $notification = array(
             'message'=>'mis à jour avec succés!',
             'alert-type'=>'success'
         );
         return redirect()->route('view.Parent')->with($notification);


         }

         public function destroy($id)
    {
        $parent = parents::findOrFail($id);
        foreach($parent->eleves as $eleve){
            $eleve->delete();
        }
        $parent->delete();

        return redirect()->route('view.Parent')->with('completed', 'Parent suprimer!!');
    }
    


}

