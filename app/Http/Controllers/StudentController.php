<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eleves;
use App\Models\parents;
use App\Models\Annee;


class StudentController extends Controller
{

   public function eleve()
   {

      $allData = eleves::all()->load(['parent','classe.annee']);

     return view('elevess-eleve',compact('allData'));
   }

   public function ajoute(){

     $annees = Annee::all();
     $parents= parents::all();

      return view('elevesajoute',compact('parents','annees'));

       }

   public function store(Request $request)
   {
    $request->validate([
        'nom_el'=>'required',
        'prenom_el'=>'required',
        'date_naiss'=>'required',
        'image'=>'required',
        'parent_id'=>'required',
        'classe_id'=>'required',
    ]);


    $request_data=$request->except(['image','annee_id']);

   if ($request -> file('image')){
      $image = $request->file('image');
      $imagename = date('YmdHi').$image->getClientOriginalName();
     $image->move(public_path('upload'), $imagename);
       $request_data['image']= $imagename;
    }
       eleves::create($request_data);

       $notification = array(
         'message'=>'Insertion avec succées!',
           'alert-type'=>'success'
      );
        return redirect()->route('eleve.Student')->with($notification);
      //back()->with($notification);

   } 

 public function delete($id){

   eleves::find($id)->delete();
       $notification = array(
           'message'=>'Suppression avec succées!',
           'alert-type'=>'warning'

       );
       return back()->with($notification);

   }

public function edit( $id){

   $parents = Parents::all();
   $annees = Annee::all();
   $editData = eleves::where('id',$id)->first();
   return view('elevesajoute', compact('editData','parents','annees'));

}

public function update( Request $request ,eleves $eleve){

   $request->validate([
      'nom_el'=>'required',
      'prenom_el'=>'required',
      'date_naiss'=>'required',
      'image'=>'required',
      'parent_id'=>'required',
      'classe_id'=>'required',
  ]);
            $eleve->update($request->all());

            $notification = array(
             'message'=>'mis à jour avec succés!',
             'alert-type'=>'success'
         );
         return redirect()->route('eleve.Student')->with($notification);
         }



      // for demo purpose
      //public function demo(){
             //  return view('sample');
      //}

}
