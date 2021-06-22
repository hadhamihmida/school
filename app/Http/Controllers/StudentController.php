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

      $allData = eleves::with(['parent','classe.annee'])->paginate(3);
      //dd($allData);
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
   public function getMessages(){
    return $messages =[
         'nom_el.required'=>'tapez le nom',
         'prenom_el.required'=>'tapez le prenom ',
         'date_naiss.required'=>'tapez date de naissance',
         'image.required'=>'entrer image',
         'parent_id.required'=>'tapez le nom de parent',
         'classe_id.required'=>'tapez le classe',
     ];
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

   public function destroy($id)
   {
      //Students
       $eleve = eleves::findOrFail($id);
       $eleve->delete();

       return redirect()->route('eleve.Student')->with('completed', 'seance suprimer!!');

   }


   public function exmans(eleves $eleve): \Illuminate\Http\JsonResponse
   {
       $data=$eleve->load('exmans.matiere')->exmans()->where('semseter','1')->get()->each(function ($item, $key){
           $item->multi= $item->matiere->nombre*$item->pivot->note;
       });
       $data2=$eleve->load('exmans.matiere')->exmans()->get()->where('semseter','2')->each(function ($item, $key){
           $item->multi= $item->matiere->nombre*$item->pivot->note;
       });
      return response()->json([
          'data'=>[
              'semseter_1'=>$data,
              'semseter_2'=>$data2,
          ],
          'sum'=>$data->pluck('matiere')->sum('nombre'),
          'sum2'=>$data2->pluck('matiere')->sum('nombre')
      ]);
   }
}
