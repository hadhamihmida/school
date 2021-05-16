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

      $allData = eleves::all()->load('parent');

     return view('elevess-eleve',compact('allData'));
   }

   public function ajoute(){

     $annees = Annee::all();
     $parents= parents::all();
     
      return view('elevesajoute',compact('parents','annees'));
   
       }

   public function store(Request $request)
   {
    $data = new eleves;
    $data -> nom_el = $request->nom_el;
    $data -> prenom_el = $request->prenom_el;
    $data -> email_pr = $request->email_pr;
    $data -> nom_pr = $request->nom_pr;
    $data -> classe = $request-> classe;
    $data -> date_naiss = $request-> date_naiss;
    $data -> adresse_el = $request-> adresse_el;
    $data -> parent_id = $request-> parent_id;
    

   if ($request -> file('image')){
      $image = $request->file('image');
      $imagename = date('YmdHi').$image->getClientOriginalName();
     $image->move(public_path('upload'), $imagename);
       $data['image']= $imagename;
    }
   $data->save();

   // student is saved
   // now find parent by name

//$parent = parents::where('nom_pr', $request->nom_pr )->first();

   //now we have parents

   // now we will save parents with students
   // this is for example 
  
   //$parent->student()->save($student);

$notification = array(
'message'=>'Insertion avec succées!',
  'alert-type'=>'success'
  );
return back()->with($notification);

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

   $editData = eleves::where('id',$id)->first();
   return view('elevesajoute', compact('editData'));

}
// for demo purpose
public function demo(){
   return view('sample');
} 

}